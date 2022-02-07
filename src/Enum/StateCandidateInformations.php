<?php

namespace App\Enum;

class StateCandidateInformations
{
    const NONPRISENCHARGE = "Non pris en charge";
    const ENCOURSDEREDACTION = "En cours de rédaction";
    const VALIDER = "Validé";
    const ENCOURSDECORRECTION = "En cours de correction";

    const ALL = [
        self::NONPRISENCHARGE => self::NONPRISENCHARGE,
        self::ENCOURSDEREDACTION => self::ENCOURSDEREDACTION,
        self::ENCOURSDECORRECTION => self::ENCOURSDECORRECTION,
        self::VALIDER => self::VALIDER
    ];
}