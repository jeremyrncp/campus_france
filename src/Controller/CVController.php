<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CVType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    /**
     * @Route("/app/moncv", name="student_cv")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cvForm = $this->createForm(CVType::class);
        $cvForm->handleRequest($request);

        if ($cvForm->isSubmitted() && $cvForm->isValid()) {
            /** @var File $cvFile */
            $cvFile = $cvForm->get('cv')->getData();

            $newName = md5(time()) . "." . $cvFile->getExtension();

            /** UploadedFile $cvFile */
            $cvFile->move(__DIR__ . "/../../public/uploads/", $newName);

            /** @var User $user */
            $user = $this->getUser();
            $user->setCv($newName);
            $user->setDateCV(new \DateTime());

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('flashes', 'CV bien envoyé');
        }

        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CVController',
            'cvForm' => $cvForm->createView()
        ]);
    }
}
