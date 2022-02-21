<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class StatutScrapingExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('colorizeStatut', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('colorizeStatut', [$this, 'doSomething']),
        ];
    }

    public function doSomething($value)
    {
        if ($value === 'Complet') {
            return 'text-success';
        }

        if ($value === 'Hors délai') {
            return 'text-danger';
        }

        if ($value === 'Manque justificatif') {
            return 'text-warning';
        }

        return 'text-info';
    }
}
