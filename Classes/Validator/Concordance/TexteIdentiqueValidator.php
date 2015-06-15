<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Validator\Concordance;

/**
 * Description of TexteIdentiqueValidator
 *
 * @author Maxime
 */
class TexteIdentiqueValidator
{

    /**
     * Test si les deux chaînes sont identiques
     * @param string $chaine
     * @param string $chaine2
     * @return boolean
     */
    public function testConcordance($chaine, $chaine2)
    {
        if ($chaine == $chaine2) {
            return true;
        } else {
            return false;
        }
    }

}
