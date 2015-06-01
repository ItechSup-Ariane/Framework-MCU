<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Liste;

use ItechSup\Widget\Widget;

/**
 * Description of WidgetComboBox
 *
 * @author Maxime
 */


class WidgetComboBox extends Widget {
    
    protected $tab=array();
    
    public function __construct($name,$label,$tab,$messageErreur=''){
        parent::__construct($name,$label,$messageErreur);
        $this->tab=$tab;
    }
    
    public function add($element){
            $this->tab[]= $element;
    }
    
    public function addList($element){
        foreach($element as $e){
            $this->tab[]= $e;
        }
    }
    
    public function delete($index){
        unset($this->tab[$index]);
    }
    
    public function getTab() {
        return $this->tab;
    }

    public function render(){
        $value = "<tr><td><label>".$this->label."</label></td><td><select name='".$this->name."'>";
        foreach($this->tab as $t){
            $value.="<option value='".$t."'>".$t."</option>";
        }
        $value.="</select></td></tr>";
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        return $value;
    }
}
