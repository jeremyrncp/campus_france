<?php

namespace App\Controller;

use App\Repository\ScrapingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScrapingController extends AbstractController
{
    /**
     * @Route("/app/scraping", name="scraping")
     */
    public function index(ScrapingRepository  $scrapingRepository): Response
    {
        $scraping = $scrapingRepository->findOneBy(['user' => $this->getUser()]);

        return $this->render('scraping/index.html.twig', [
            'scraping' => $scraping
        ]);
    }
}
