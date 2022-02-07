<?php

namespace App\Controller\Admin;

use App\Entity\CandidateInformations;
use App\Enum\StateCandidateInformations;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CandidateInformationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CandidateInformations::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user'),
            ChoiceField::new('personalInformationsStepOne', 'Situation personnelle actuelle')
                ->setChoices(StateCandidateInformations::ALL),
            ChoiceField::new('personalInformationsStepTwo', 'Mon parcours et mes diplômes')
                ->setChoices(StateCandidateInformations::ALL),
            ChoiceField::new('personalInformationsStepThree', 'Mes compétences linguistiques')
                ->setChoices(StateCandidateInformations::ALL),
            ChoiceField::new('basketStepOne', 'Mon panier de formation')
                ->setChoices(StateCandidateInformations::ALL),
            ChoiceField::new('basketStepTwo', 'Mes formations demandées')
                ->setChoices(StateCandidateInformations::ALL),
            ChoiceField::new('submissionStepOne', 'Soumission dossier')
                ->setChoices(StateCandidateInformations::ALL)
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInPlural('Informations candidat')
            ->setEntityLabelInSingular("Informations candidat")
            ;
    }
}
