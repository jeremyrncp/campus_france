<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Field\FileField;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            TextField::new('fullName', 'Nom complet'),
            EmailField::new('email', 'Email'),
            TextField::new('usernameCampusFrance', 'Nom utilisdateur Campus France'),
            TextField::new('passwordCampusFrance', 'Mot de passe Campus France'),
            ImageField::new('cv', 'CV')
                        ->setTemplateName('field/file.html.twig')
                        ->setTemplatePath('field/file.html.twig')
                        ->setUploadDir('public/uploads/'),
            BooleanField::new('etatScraping', 'Etat scraping'),
            BooleanField::new('isVerified', 'Compte verifié'),
            BooleanField::new('planpremium', 'Plan premium')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInPlural('Utilisateurs')
            ->setEntityLabelInSingular("Utilisateur")
            ;
    }
}
