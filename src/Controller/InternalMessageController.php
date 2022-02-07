<?php

namespace App\Controller;

use App\Entity\InternalMessage;
use App\Form\InternalMessageType;
use App\Repository\InternalMessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InternalMessageController extends AbstractController
{
    /**
     * @Route("/app/internal/message", name="internal_message")
     *
     * @param Request $request
     * @param InternalMessageRepository $internalMessageRepository
     * @return Response
     */
    public function index(Request $request, InternalMessageRepository $internalMessageRepository, EntityManagerInterface $entityManager): Response
    {
        $internalMessageForm = $this->createForm(InternalMessageType::class);
        $internalMessageForm->handleRequest($request);

        if ($internalMessageForm->isSubmitted() && $internalMessageForm->isValid()) {
            /** @var InternalMessage $internalMessage */
           $internalMessage = $internalMessageForm->getData();

           $internalMessage->setUser($this->getUser());
           $internalMessage->setDate(new \DateTime());
           $internalMessage->setIsAdminResponse(false);

            $entityManager->persist($internalMessage);
            $entityManager->flush();

            $this->addFlash('flashes', 'Message bien ajouté');
        }

        return $this->render('internal_message/index.html.twig', [
            'internalMessages' => $internalMessageRepository->findBy(['user' => $this->getUser()], ['id' => 'DESC']),
            'form' => $internalMessageForm->createView()
        ]);
    }
}
