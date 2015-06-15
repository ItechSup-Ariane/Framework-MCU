<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Validator\Format;

/**
 * Description of CPFormatValidator
 *
 * @author Maxime
 */
class CPFormatValidator
{

    /**
     * Test si le code postal correspond aux normes (5 chiffres)
     * @param string $chaine
     * @return boolean
     */
    public function testFormat($chaine)
    {
        if (preg_match("#[0-9]{5}#", $chaine)) {
            return true;
        } else {
            return false;
        }
    }

}
