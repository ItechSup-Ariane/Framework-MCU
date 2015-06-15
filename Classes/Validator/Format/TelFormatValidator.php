<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Validator\Format;

/**
 * Description of TelFormatValidator
 *
 * @author Maxime
 */
class TelFormatValidator
{

    /**
     * Test si le format respecte les normes (10 chiffres)
     * @param string $chaine
     * @return boolean
     */
    public function testFormat($chaine)
    {
        if (preg_match("#[0-9]{10}$#", $chaine)) {
            return true;
        } else {
            return false;
        }
    }

}
