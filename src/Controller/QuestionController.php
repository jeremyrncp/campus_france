<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/faq/{id}", name="app_view_question")
     */
    public function question(Question $question) : Response
    {
        return $this->render('question/faq.html.twig', ['question' => $question]);
    }

    /**
     * @Route("/faq", name="app_list_question")
     */
    public function faq(QuestionRepository $questionRepository) : Response
    {
        return $this->render('question/index.html.twig', ['questions' => $questionRepository->findAll()]);
    }
}
