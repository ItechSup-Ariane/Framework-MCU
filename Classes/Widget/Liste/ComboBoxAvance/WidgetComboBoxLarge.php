<?php

namespace ItechSup\Widget\Liste\ComboBoxAvance;

use ItechSup\Widget\Liste\WidgetComboBox;

/**
 * Description of WidgetComboBoxLarge
 * ComboBox à sélection multiple, affichage ici de size=5 
 * 
 *
 * @author Maxime
 */
class WidgetComboBoxLarge extends WidgetComboBox
{

    public function __construct($name, $label, $tab, $messageErreur = '')
    {
        parent::__construct($name, $label, $tab, $messageErreur);
    }

    /**
     * Fonction qui récupère l'élément sélectionné depuis le tableau POST
     * On ajoute une valeur true au choix qui a été selectionné 
     * dans le tableau de notre objet
     * @param string $tabPOST
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
     * créer une liste à choix multiple de type ComboBox.
     * @return string
     */
    public function render()
    {
        //On ajoute l'attribut multiple au select 
        //pour laisser la possbilité d'une sélection multiple.
        //On déclare le nom du select comme un tableau 
        //pour récupérer toutes les lignes sélectionnées

        $value = "<tr><td><label>" . $this->label . "</label></td>"
            . "<td><select name='" . $this->name . "[]' size='5' multiple=true>";

        foreach ($this->tab as $t) {
            //Les lignes sélectionnées sont définies comme des array,
            // on teste donc si $t est un array ou un string, et s'il est true
            if ((is_array($t) && ($t[1] = true))) {
                $value.="<option value='" . $t[0] . "' selected=\'selected\'>"
                    . $t[0] . "</option>";
            } else {
                $value.="<option value='" . $t . "'>" . $t . "</option>";
            }
        }
        $value.="</select></td></tr>";
        if ($this->messageErreur != '') {
            $value .= "<tr><td COLSPAN='2'><span class='warning'>"
                . $this->messageErreur . "</span></td></tr>";
        }
        return $value;
    }

}
