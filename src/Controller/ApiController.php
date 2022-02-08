<?php

namespace App\Controller;

use App\DTO\ScrapingDTO;
use App\Entity\Paiement;
use App\Entity\Scraping;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/scraping", name="api_scraping", methods={"POST"})
     */
    public function index(
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $usernameEtudes = $request->query->get('usernameEtudes');
        $userRepository = $entityManager->getRepository(User::class);

        $user = $userRepository->findOneBy(['usernameCampusFrance' => $usernameEtudes]);

        if ($user instanceof User) {
            $scrapingDTO = new ScrapingDTO(json_decode($request->getContent(), true));
            $scraping = $scrapingDTO->fillScraping((new Scraping()));
            $user->addScraping($scraping);

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            $entityManager->persist($user);
            $entityManager->flush();

            return new JsonResponse(['status' => 'ok'], Response::HTTP_CREATED);
        }

        throw new \Exception('User must be provided');

    }


    /**
     * @Route("/api/service/stripe", name="api_scripe_validation", methods={"POST"})
     */
    public function webHookStripe(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $endpoint_secret = 'whsec_ZbllkCXZ9l915uQKyJLSlUmnzoGAJAIf';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $billingDetails = $event->data->object->charges->data[0]->billing_details;

                $user = $userRepository->findOneBy(['email' => $billingDetails->email]);

                if (is_null($user)) {
                    http_response_code(400);
                    exit();
                }

                $paiement = new Paiement();

                $dateTime = new \DateTime();
                $dateTime->setTimestamp($event->created);

                $paiement->setDate($dateTime);
                $paiement->setData($event->toArray());
                $paiement->setAmount($event->data->object->amount/100);
                $user->setPlanpremium(true);
                $user->addPaiement($paiement);

                $entityManager->persist($user);
                $entityManager->flush();

                return new JsonResponse(['status' => 'ok'], Response::HTTP_OK);

            default:
                echo 'Received unknown event type ' . $event->type;
        }
    }
}