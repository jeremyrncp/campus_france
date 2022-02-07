<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Repository\ScrapingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class IndexController extends AbstractController
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * NotifService constructor.
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(ScrapingRepository $scrapingRepository, Request $request): Response
    {
        $contactForm = $this->createForm(ContactFormType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $this->sendEmail($this->getParameter('emailscontact'));

            $this->addFlash('flashes', 'Email envoyé avec succès, vous recevrez un autre  e-mail dès que votre dossier sera pris en charge par nos services');
        }

        return $this->render('index.html.twig', [
            'scraping' => $scrapingRepository->findOneBy(['user' => $this->getUser()]),
            'form' => $contactForm->createView()
        ]);
    }

    private function sendEmail($emails)
    {
        $email = (new Email())
            ->from('contact@ŋaultierweb.com');

        foreach ($emails as $emailList) {
            $email->to($emailList);
        }

        $email
            ->subject('Contact')
            ->setBody();

        $this->mailer->send($email);
    }
}
