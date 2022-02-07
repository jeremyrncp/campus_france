<?php

namespace App\Controller;

use App\Repository\CandidateInformationsRepository;
use App\Repository\ScrapingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="dashboard_student")
     */
    public function index(ScrapingRepository $scrapingRepository, CandidateInformationsRepository $candidateInformationsRepository): Response
    {
        return $this->render('student/index.html.twig', [
            'state' => $candidateInformationsRepository->findOneBy(['user' => $this->getUser()]),
            'scraping' => $scrapingRepository->findOneBy(['user' => $this->getUser()]),
        ]);
    }
}
