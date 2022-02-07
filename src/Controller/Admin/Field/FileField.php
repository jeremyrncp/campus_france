<?php


namespace App\Controller\Admin\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Component\Form\Extension\Core\Type\FileType;

final class FileField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null)
    {
        return (new self())
                ->setProperty($propertyName)
                ->setTemplateName("field/file.html.twig")
                ->setTemplatePath('field/file.html.twig')
                ->setLabel($label)
                ->setFormType(FileType::class)
                ->setFormTypeOptions(['data_class' => null])
            ;
    }
}
