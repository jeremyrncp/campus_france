<?php

namespace App\Controller\Admin;

use App\Entity\Discussion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DiscussionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Discussion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user'),
            DateField::new('dateCreation'),
            TextField::new('subject')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInPlural('Discussions')
            ->setEntityLabelInSingular("Discussion")
            ;
    }
}
