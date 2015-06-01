<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Validator\Format;

/**
 * Description of UrlFormatValidator
 *
 * @author Maxime
 */
class UrlFormatValidator {
    public function testFormat($chaine){
    if (preg_match("##", $chaine)){
        return true;
    }
    else
    {
        return false;
    }
}
}
