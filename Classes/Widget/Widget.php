<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget;

/**
 * Description of Widget
 *
 * @author Maxime
 */
abstract class Widget {
    
    protected $name;
    protected $label;
    protected $messageErreur;
    
    public function __construct($name,$label,$messageErreur){
        $this->name = $name;
        $this->label = $label;
        $this->messageErreur = $messageErreur;
    }
    
    function getName() {
        return $this->name;
    }

    function getLabel() {
        return $this->label;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLabel($label) {
        $this->label = $label;
    }  
    
    function getMessageErreur() {
        return $this->messageErreur;
    }

    function setMessageErreur($messageErreur) {
        $this->messageErreur = $messageErreur;
    }


}
