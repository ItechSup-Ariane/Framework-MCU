<?php

namespace ItechSup\Widget\Liste\ComboBoxAvance;

use ItechSup\Widget\Liste\WidgetComboBox;

/**
 * Classe WidgetCheckBox
 * 
 * Widget de type CheckBox qui affiche les différentes options en verticale, 
 * avec sélection multiple.
 * Widget hérité de WidgetComboBox
 * 
 * 
 * 
 * @author Maxime
 */
class WidgetListeCheckBox extends WidgetComboBox
{

    private function __construct($name, $label, $tab, $messageErreur = '')
    {
        parent::__construct($name, $label, $tab, $messageErreur);
    }

    /**
     * Ajout d'une variable,objet,array,etc. au tableau tab
     * @param $choix
     */
    public function add($choix)
    {
        $this->tab[] = $choix;
    }

    /**
     * Récupère en paramêtre un array correspondant 
     * à la liste des cases à cocher modifiées.
     * Parcourt la liste des cases à cocher 
     * et change le string correspondant aux cases cochées 
     * par un tableau de ce string et d'un booleen à true.
     * 
     * @param array $tabPOST
     */
    public function bind($tabPOST)
    {
        foreach ($tabPOST as $value) {
            foreach ($this->tab as $key => $t) {
                if ($t == $value) {
                    $this->change($key, array($value, true));
                }
            }
        }
    }

    /**
     * Fonction qui permet de créer l'affichage de notre Widget
     * On retourne un string comportant le code HTML permettant de 
     * créer une liste à choix multiple de type CheckBox.
     * @return string
     */
    public function render()
    {
        $value = '<tr><td><label>' . $this->label . '</label></td><td><ul>';
        foreach ($this->tab as $c) {
            //Les cases cochées sont définies comme des array, 
            //on teste donc si $c est un array ou un string, et s'il est true
            var_dump($c);
            if ((is_array($c) && ($c[1] = true))) {
                //Si c'est un array, on coche la case 
                $value.= '<li><input type=\'checkbox\' name=' . $this->name .
                    '[]\' value=' . $c[0] . ' checked=\'checked\'>' . $c[0] . '</li>';
            } else {
                $value.= '<li><input type=\'checkbox\' name=' . $this->name .
                    '[]\' value=' . $c . '>' . $c . '</li>';
            }
        }
        $value.='</ul></td></tr>';
        if ($this->messageErreur != '') {
            $value .= "<tr><td COLSPAN='2'><span class='warning'>"
                . $this->messageErreur . "</span></td></tr>";
        }
        return $value;
    }

}
