<?php

namespace ItechSup\Widget\Liste\ComboBoxAvance;

use ItechSup\Widget\Liste\WidgetComboBox;

/**
 * Description of WidgetListeRadio
 * Affichage d'un Widget 'Bouton Radio' 
 * avec les diverses options déclinées en vertical, selection simple.
 * Widget hérité de WidgetComboBox
 *
 * @author Maxime
 */
class WidgetListeRadio extends WidgetComboBox
{

    private function __construct($name, $label, $liste, $messageErreur = '')
    {
        parent::__construct($name, $label, $liste, $messageErreur);
    }

    /**
     * Fonction qui permet de créer l'affichage de notre Widget
     * On retourne un string comportant le code HTML permettant de 
     * créer une liste à choix simple de type Radio.
     * @return string
     */
    public function render()
    {
        $value = '<tr><td><label>' . $this->label . '</label></td><td><ul>';
        foreach ($this->tab as $c) {
            //La case cochée est définie comme un array, 
            //on teste donc si $c est un array ou un string, et s'il est true
            if ((is_array($c) && ($c[1] = true))) {
                //Si c'est un array, on coche la case 
                $value.= '<li><input type=\'radio\' name=' . $this->name .
                    '[]\' value=' . $c[0] . ' checked=\'checked\'>' . $c[0] . '</li>';
            } else {
                $value.= '<li><input type=\'radio\' name=' . $this->name .
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
