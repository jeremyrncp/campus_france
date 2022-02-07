<?php

namespace App\Controller;

use App\Repository\ScrapingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ScrapingRepository $scrapingRepository): Response
    {
        return $this->render('index.html.twig', [
            'scraping' => $scrapingRepository->findOneBy(['user' => $this->getUser()]),
        ]);
    }
}
