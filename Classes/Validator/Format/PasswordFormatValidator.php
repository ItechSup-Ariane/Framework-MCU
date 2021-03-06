<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Validator\Format;

/**
 * Description of PasswordFormatValidator
 *
 * @author Maxime
 */
class PasswordFormatValidator
{

    /**
     * Test si le format respecte les normes (nombre de caractères,
     * avec caractères spéciaux, avec chiffre etc.) 
     * @param string $chaine
     * @return boolean
     */
    public function testFormat($chaine)
    {
        if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $chaine)) {
            return true;
        } else {
            return false;
        }
    }

}
