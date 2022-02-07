<?php

namespace App\Controller\Admin;

use App\Entity\InternalMessage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class InternalMessageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InternalMessage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName === 'new') {
            return [
                AssociationField::new('user'),
                DateTimeField::new('date')
                    ->setValue(new \DateTime()),
                TextareaField::new('content'),
            ];
        }

        return [
            AssociationField::new('user'),
            DateTimeField::new('date'),
            TextareaField::new('content'),
            BooleanField::new('isAdminResponse')
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $internalMessage = new InternalMessage();
        $internalMessage->setIsAdminResponse(true);

        return $internalMessage;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInPlural('Messages internes')
                ->setEntityLabelInSingular("Message interne")
            ;
    }
}
