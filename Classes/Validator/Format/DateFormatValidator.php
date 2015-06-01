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
class DateFormatValidator {


public function testFormat($chaine){
    if (preg_match("#[0-9]{2}+/[0-9]{2}+/[0-9]{4}$#", $chaine)){
        return true;
    }
    else
    {
        return false;
    }
}
}
