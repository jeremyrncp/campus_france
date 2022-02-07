<?php

namespace App\Controller;

use App\Entity\Discussion;
use App\Entity\Message;
use App\Form\AddDiscussionType;
use App\Repository\DiscussionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class StudentDiscussionController extends AbstractController
{
    /**
     * @Route("/app/studentdiscussion", name="student_discussion")
     */
    public function index(DiscussionRepository  $discussionRepository): Response
    {
        return $this->render('student_discussion/index.html.twig', [
            'discussions' => $discussionRepository->findAll()
        ]);
    }

    /**
     * @Route("/studentdiscussion/list/{id}", name="student_discussion_list")
     */
    public function list(Discussion $discussion, EntityManagerInterface  $entityManager): Response
    {
        return $this->render('student_discussion/list.html.twig',
            ['discussion' => $discussion]
        );
    }

    /**
     * @Route("/app/studentdiscussion/add", name="student_discussion_add")
     */
    public function add(Request $request, EntityManagerInterface  $entityManager): Response
    {
        $form = $this->createForm(AddDiscussionType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataForm = $form->getData();

            $discussion = new Discussion();
            $discussion->setSubject($dataForm['subject']);
            $discussion->setDateCreation(new \DateTime());
            $discussion->setUser($this->getUser());

            $message = new Message();
            $message->setDiscussion($discussion);
            $message->setDateCreation(new \DateTime());
            $message->setContent($dataForm['message']);
            $message->setUser($this->getUser());
            $message->setStatus(true);

            $discussion->addMessage($message);

            $entityManager->persist($discussion);
            $entityManager->flush();

            $this->addFlash('flashes',
                'La discussion a bien été créee'
            );

            return $this->redirectToRoute('student_discussion_list', [
                'id' => $discussion->getId()
            ]);
        }

        return $this->render('student_discussion/add.html.twig', [
            'addDiscussionForm' => $form->createView()
        ]);
    }
}
