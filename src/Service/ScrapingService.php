<?php

namespace App\Service;

class ScrapingService
{
    private $templateDir;
    private $domain;

    /**
     * @param string $templateDir
     */
    public function __construct(string $templateDir, string $domain)
    {
        $this->templateDir = $templateDir;
        $this->domain = $domain;
    }

    /**
     * @param string $usernameEtudes
     * @param string $passwordEtudes
     * @return string
     */
    public function fillTemplate($usernameEtudes, $passwordEtudes): string
    {
        $template = file_get_contents($this->templateDir. '/tpl_scraping.spec.js');

        $templateFilled = str_replace(
            ['{{domain}}', '{{usernameCampusFrance}}', '{{passwordCampusFrance}}'],
            [$this->domain, $usernameEtudes, $passwordEtudes],
            $template
        );

        $nameTemplate = md5(time().rand()) . '.spec.js';
        file_put_contents($this->templateDir . '/generate/' . $nameTemplate, $templateFilled);


        return $this->templateDir . '/generate/' . $nameTemplate;
    }
}