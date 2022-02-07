<?php

namespace App\Controller\Admin;

use App\Entity\Paiement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PaiementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paiement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('date'),
            AssociationField::new('user'),
            IntegerField::new('amount'),
        ];
    }
}
