<?php

namespace App\Controller;

use App\DTO\ScrapingDTO;
use App\Entity\Scraping;
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
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $scrapingParameters = json_decode($request->getContent());

        $scrapingDTO = new ScrapingDTO($scrapingParameters)

        $scraping = new Scraping();
        $scraping->setDate(new \DateTime());

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $scraping->setUser($this->getUser());

        $entityManager->persist($scraping);
        $entityManager->flush();

        return new JsonResponse($serializer->serialize($scraping, 'json'), Response::HTTP_CREATED);
    }
}
