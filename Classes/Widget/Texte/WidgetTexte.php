<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Texte;

use ItechSup\Widget\Widget;

/**
 * Description of Texte
 *
 * @author Maxime
 */
//include 'Classes/Widget/Widget.php';
class WidgetTexte extends Widget{
    
    protected $texte;
    
    public function __construct($name,$label,$messageErreur=''){
        parent::__construct($name,$label,$messageErreur);
        $this->texte='';
    }
    
    public function render(){
        $value = "<tr><td><label>".$this->label."</label></td><td><input type='text' name='".$this->name."' value='".$this->texte."' /></td></tr>";
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        return $value;
    }
    
    public function isValid(){
        
    }
    
    function getTexte() {
        return $this->texte;
    }

    function setTexte($texte) {
        $this->texte = $texte;
    }
}