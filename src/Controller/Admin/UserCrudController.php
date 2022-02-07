<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Field\FileField;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
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
            IntegerField::new('id'),
            DateField::new('date'),
            TextField::new('fullName'),
            EmailField::new('email'),
            TextField::new('usernameCampusFrance'),
            TextField::new('passwordCampusFrance'),
            BooleanField::new('etatScraping'),
            FileField::new('cv'),
            BooleanField::new('isVerified'),
            BooleanField::new('planpremium')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInPlural('Utilisateurs')
            ->setEntityLabelInSingular("Utilisateur")
            ;
    }
}
