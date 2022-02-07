<?php

namespace App\Controller;

use App\Repository\PaiementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaiementController extends AbstractController
{
    /**
     * @Route("/app/paiement", name="student_paiement")
     */
    public function index(PaiementRepository $paiementRepository): Response
    {
        $paiement = $paiementRepository->findOneBy(['user' => $this->getUser()], ['date' => 'DESC']);

        return $this->render('paiement/index.html.twig', [
            'paiement' => $paiement
        ]);
    }
}
