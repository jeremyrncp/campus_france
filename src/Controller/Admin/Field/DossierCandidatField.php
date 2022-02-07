<?php


namespace App\Controller\Admin\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class DossierCandidatField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null)
    {
        return (new self())
                ->setProperty($propertyName)
                ->setTemplateName("field/dossier.html.twig")
                ->setTemplatePath('field/dossier.html.twig')
                ->setLabel($label)
                ->setFormType(TextType::class)
                ->setFormTypeOptions(['data_class' => null])
            ;
    }
}
