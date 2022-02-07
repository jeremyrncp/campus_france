<?php

namespace App\Controller;

use App\Repository\CandidateInformationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateInformationsController extends AbstractController
{
    /**
     * @Route("/candidateinformations", name="student_informations_forfait")
     */
    public function index(CandidateInformationsRepository $candidateInformationsRepository): Response
    {
        $state = $candidateInformationsRepository->findOneBy(['user' => $this->getUser()]);

        return $this->render('candidate_informations/index.html.twig', [
            'state' => $state,
        ]);
    }
}
