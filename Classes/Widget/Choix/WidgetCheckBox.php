<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Choix;

use ItechSup\Widget\Widget;

/**
 * Description of WidgetCheckBox
 *
 * @author Maxime
 */
class WidgetCheckBox extends Widget{
    private $listeChoix=array();
    
    public function __construct($name,$label,$liste,$messageErreur=''){
        parent::__construct($name,$label,$messageErreur);
        $this->listeChoix=$liste;
    }
    
    public function add($choix){
        $this->listeChoix[]=$choix;
    }
    
    public function render(){
        $i=1;
        $value='<tr><td><label>'.$this->label.'</label></td><td>';
        foreach($this->listeChoix as $c){
            $value.= '<input type=\'checkbox\' name='.$this->name.$i.' value='.$c.'>'.$c;
            $i++;
        }
        $value.='</td></tr>';
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        return $value;
    }
    
    
}
