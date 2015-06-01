<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup;

/**
 * Description of Formulaire
 *
 * @author Maxime
 */
class Formulaire {
    private $name;
    private $listeWidget;
    
    public function __construct($name) {
        $this->name=$name;
        $this->listeWidget=array();
    }
    
    public function addWidget($widget){  
        $this->listeWidget[$widget->getName()]=$widget;
        return $widget;
    }
    
    public function bind($post){
        foreach($post as $key=>$value){
            $this->listeWidget[$key]->setTexte($value);
        }
    }
    
    public function isValid(){
        foreach($this->listeWidget as $w){
            $w->isValid();
        }
    }
   
    public function afficherWidgets(){
        $value='<div id="listeWidget"><TABLE>';
        foreach($this->listeWidget as $w){
            $value.=$w->render();
        }
        $value.='</TABLE></div>';
        return $value;
    }
}
