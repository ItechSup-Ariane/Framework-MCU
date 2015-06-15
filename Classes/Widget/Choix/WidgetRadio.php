<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Choix;

use ItechSup\Widget\Widget;

/**
 * Description of WidgetRadio
 *
 * @author Maxime
 */
class WidgetRadio extends Widget
{

    private $listeChoix = array();

    private function __construct($name, $label, $liste, $messageErreur = '')
    {
        parent::__construct($name, $label, $messageErreur);
        $this->listeChoix = $liste;
    }

    /**
     * Ajout d'une variable,objet,array,etc. au tableau tab
     * @param $choix
     */
    public function add($choix)
    {
        $this->listeChoix[] = $choix;
    }

    /**
     * Fonction qui permet de créer l'affichage de notre Widget
     * On retourne un string comportant le code HTML permettant de 
     * créer une liste à choix simple de type Radio.
     * @return string
     */
    public function render()
    {
        $value = '<tr><td><label>' . $this->label . '</label></td><td>';
        foreach ($this->listeChoix as $c) {
            $value.= '<input type=\'radio\' name=' . $this->name
                . ' value=' . $c . '>' . $c;
        }
        $value.='</td></tr>';
        if ($this->messageErreur != '') {
            $value .= "<tr><td COLSPAN='2'><span class='warning'>"
                . $this->messageErreur . "</span></td></tr>";
        }
        return $value;
    }

}
