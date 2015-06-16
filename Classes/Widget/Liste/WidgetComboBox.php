<?php

namespace ItechSup\Widget\Liste;

use ItechSup\Widget\Widget;

/**
 * Description of WidgetComboBox
 *
 * @author Maxime
 */
class WidgetComboBox extends Widget
{

    protected $tab = array();

    public function __construct($name, $label, $tab, $messageErreur = '')
    {
        parent::__construct($name, $label, $messageErreur);
        $this->tab = $tab;
    }

    /**
     * Ajoute la variable à la liste de choix de notre objet WidgetComboBox
     * @param type $element
     */
    public function add($element)
    {
        $this->tab[] = $element;
    }

    /**
     * Supprime l'occurence du tableau correspondant à l'index 
     * passé en paramètre
     * @param string $index
     */
    public function delete($index)
    {
        unset($this->tab[$index]);
    }

    /**
     * Remplace la valeur correspondant à l'index passé en paramètre 
     * par la variable passée en second paramètre
     * @param string $index
     * @param $final
     */
    public function change($index, $final)
    {
        $this->tab[$index] = $final;
    }

    /**
     * Retourne la liste correspondant à notre ComboBox
     * @return array
     */
    public function getTab()
    {
        return $this->tab;
    }

    /**
     * Fonction qui permet de créer l'affichage de notre Widget
     * On retourne un string comportant le code HTML permettant de 
     * créer une liste à choix simple de type ComboBox.
     * @return string
     */
    public function render()
    {
        //La ComboBox sera également dans le tableau. On lui indique un label 
        $value = "<tr><td><label>" . $this->label . "</label></td>"
            . "<td><select name='" . $this->name . "'>";

        //On parcourt le tableau de possibilités de l'objet Combo
        foreach ($this->tab as $t) {
            //Las ligne sélectionnée est définie comme un array, 
            //on teste donc si $t est un array ou un string, et s'il est true
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

    /**
     * Fonction qui récupère l'élément sélectionné depuis le tableau POST
     * On ajoute une valeur true au choix qui a été selectionné 
     * dans le tableau de notre objet
     * @param string $value
     */
    public function bind($value)
    {
        foreach ($this->tab as $key => $t) {
            if ($t == $value) {
                $this->change($key, array($value, true));
            }
        }
    }

}
