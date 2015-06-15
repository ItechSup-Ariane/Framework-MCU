<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Validator\Format;

/**
 * Description of MailFormatValidator
 *
 * @author Maxime
 */
class MailFormatValidator
{

    /**
     * Test si le format respecte les normes (caractères spéciaux,
     * nombre de caractères avant et après arobase) 
     * @param string $chaine
     * @return boolean
     */
    public function testFormat($chaine)
    {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#", $chaine)) {
            return true;
        } else {
            return false;
        }
    }

}
