<?php

namespace ItechSup\Widget\Texte\TexteAvance;

use ItechSup\Widget\Texte\WidgetTexte;
use ItechSup\Validator\Format as VF;

/**
 * Description of WidgetDate
 * Widget permettant de gérer l'affichage d'un widget de type date
 *
 * @author Maxime
 */
class WidgetDate extends WidgetTexte
{

    private $validatorFormatDate;

    public function __construct($name, $label, $messageErreur = '')
    {
        parent::__construct($name, $label, $messageErreur);
        $this->texte = '';
        $this->validatorFormatDate = new VF\DateFormatValidator();
    }

    /**
     * Création d'un validateur ValidatorFormatDate qui servira 
     * à tester si le format de la date est conforme
     * @return boolean
     */
    public function formatTest()
    {
        if (!$this->validatorFormatDate->testFormat($this->texte)) {
            $this->messageErreur = 'Format de date invalide!';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Fonction qui permet de créer l'affichage de notre Widget
     * On retourne un string comportant le code HTML permettant de 
     * créer un champ de saisie de date.
     * @return string
     */
    public function render()
    {
        $value = "<tr><td><label>" . $this->label . "</label></td>"
            . "<td><input type='date' name='" . $this->name
            . "' value='" . $this->texte . "' /></td></tr>";
        if ($this->messageErreur != '') {
            $value .= "<tr><td COLSPAN='2'><span class='warning'>"
                . $this->messageErreur . "</span></td></tr>";
        }
        return $value;
    }

    /**
     * Fonction de validation du widget, 
     * ici elle appelera la fonction formatTest qui test le format de la date donnée. 
     * @return boolean
     */
    public function isValid()
    {
        return $this->formatTest();
    }

}
