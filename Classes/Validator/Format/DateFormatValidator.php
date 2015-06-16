<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Validator\Format;

/**
 * Description of DateFormatValidator
 *
 * @author Maxime
 */
class DateFormatValidator
{

    /**
     * Test si le format respecte les normes (aaaa-mm-jj avec en sépartaeur . / ou -)
     * @param string $chaine
     * @return boolean
     */
    public function testFormat($chaine)
    {
        if (preg_match("#^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$#", $chaine)) {
            return true;
        } else {
            return false;
        }
    }

}
