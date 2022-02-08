<?php

namespace App\Controller\Admin;

use App\Entity\CandidateInformations;
use App\Entity\Discussion;
use App\Entity\InternalMessage;
use App\Entity\Message;
use App\Entity\Paiement;
use App\Entity\Scraping;
use App\Entity\Task;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Campus France')
            ->disableUrlSignatures(true);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Paiements', 'fas fa-dollar-sign', Paiement::class);
        yield MenuItem::linkToCrud('Scrapings', 'fas fa-file', Scraping::class);
        yield MenuItem::linkToCrud('Tâches (scraping)', 'fas fa-tasks', Task::class);
        yield MenuItem::linkToCrud('Statuts dossier candidat', 'fas fa-file', CandidateInformations::class);
        yield MenuItem::linkToCrud('Messagerie interne', 'far fa-comments', InternalMessage::class);
        yield MenuItem::linkToCrud('Discussions (forum)', 'far fa-comments', Discussion::class);
        yield MenuItem::linkToCrud('Messages (forum', 'fab fa-rocketchat', Message::class);
    }

    /**
     * @Route("/adminuserscraping/{id}", name="admin_user_scraping")
     * @param Scraping $scraping
     * @return Response
     */
    public function userScraping(Scraping $scraping): Response
    {
        return $this->render('scraping/index_admin.html.twig', [
            'scraping' => $scraping
        ]);
    }
}
