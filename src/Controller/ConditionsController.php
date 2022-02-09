<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConditionsController extends AbstractController
{
    /**
     * @Route("/cgv", name="app_cgv")
     */
    public function cgv(): Response
    {
        return $this->render('conditions/cgv.html.twig');
    }

    /**
     * @Route("/cgu", name="app_cgu")
     */
    public function cgu(): Response
    {
        return $this->render('conditions/cgu.html.twig');
    }

    /**
     * @Route("/mentionslegales", name="app_mentions_legales")
     */
    public function mentionslegales(): Response
    {
        return $this->render('conditions/mentions_legales.html.twig');
    }
}
