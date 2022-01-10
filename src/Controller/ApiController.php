<?php

namespace App\Controller;

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
        $scraping = json_decode($request->getContent());

        $scraping = new Scraping($scraping);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $entityManager->persist($scraping);
        $entityManager->flush();

        return new JsonResponse($serializer->serialize($scraping, 'json'), Response::HTTP_CREATED);
    }
}
