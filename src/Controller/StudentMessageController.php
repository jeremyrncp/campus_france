<?php

namespace App\Controller;

use App\Entity\Discussion;
use App\Entity\Message;
use App\Form\AddMessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class StudentMessageController extends AbstractController
{
    /**
     * @Route("/app/studentdiscussion/addmessage/{discussion}", name="student_message_add")
     */
    public function index(Discussion $discussion, Request $request, EntityManagerInterface  $entityManager): Response
    {
        $form = $this->createForm(AddMessageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Message $message */
            $message = $form->getData();
            $message->setUser($this->getUser());
            $message->setDateCreation(new \DateTime());
            $message->setDiscussion($discussion);
            $message->setStatus(true);

            $entityManager->persist($message);
            $entityManager->flush();

            $this->addFlash('flashes',
                'Message bien ajouté'
            );

            return $this->redirectToRoute('student_discussion_list', [
                'id' => $discussion->getId()
            ]);

        }
        return $this->render('student_message/add.html.twig', [
            'controller_name' => 'StudentMessageController',
            'addMessageForm' => $form->createView()
        ]);
    }
}
