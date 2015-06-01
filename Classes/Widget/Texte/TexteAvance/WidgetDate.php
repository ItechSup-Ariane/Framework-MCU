<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Texte\TexteAvance;

use ItechSup\Widget\Texte\WidgetTexte;
use ItechSup\Validator\Format as VF;
/**
 * Description of WidgetDate
 *
 * @author Maxime
 */
class WidgetDate extends WidgetTexte{
    private $validatorFormatDate;
    public function __construct($name,$label,$messageErreur=''){
        parent::__construct($name,$label,$messageErreur);
        $this->texte='';
        $this->validatorFormatDate = new VF\DateFormatValidator();
    }
    
    public function formatTest(){
        if(!$this->validatorFormatDate->testFormat($this->texte)){
           $this->messageErreur='Format de date invalide!';
        }
    }
    
    public function render(){
        $value = "<tr><td><label>".$this->label."</label></td><td><input type='date' name='".$this->name."' value='".$this->texte."' /></td></tr>";
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        return $value;
    }
    
    public function isValid(){
        $this->formatTest();
    }
}
