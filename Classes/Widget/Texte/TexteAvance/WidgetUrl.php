<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Texte\TexteAvance;

use ItechSup\Widget\Texte\WidgetTexte;
/**
 * Description of WidgetUrl
 *
 * @author Maxime
 */

class WidgetUrl extends WidgetTexte {
    
    public function __construct($name,$label,$messageErreur=''){
        parent::__construct($name,$label,$messageErreur);
        $this->texte='';
    }
    
    public function render(){
        $value = "<tr><td><label>".$this->label."</label></td><td><input type='url' name='".$this->name."' value='".$this->texte."' /></td></tr>";
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        return $value;
    }
}
