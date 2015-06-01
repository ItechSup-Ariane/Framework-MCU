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
 * Description of WidgetMail
 *
 * @author Maxime
 */

class WidgetMail extends WidgetTexte {
    private $validatorFormatMail;
    public function __construct($name,$label,$messageErreur=''){
        parent::__construct($name,$label,$messageErreur);
        $this->texte='';
        $this->validatorFormatMail = new VF\MailFormatValidator();
    }
    
    public function formatTest(){
        if(!$this->validatorFormatMail->testFormat($this->texte)){
            
            $this->messageErreur='Adresse mail invalide!';
        }
    }
    
    public function render(){
        
        $value = "<tr><td><label>".$this->label."</label></td><td><input type='email' name='".$this->name."' value='".$this->texte."' /></td></tr>";
        
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        
        return $value;
    }
    
    public function isValid(){
        $this->formatTest();
    }
}
