<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Texte\TexteAvance;

use ItechSup\Widget\Texte\WidgetTexte;
use ItechSup\Validator\Format as VF;

/**
 * Description of WidgetTel
 *
 * @author Maxime
 */
class WidgetTel extends WidgetTexte
{

    private $validatorFormatTel;

    public function __construct($name, $label, $messageErreur = '')
    {
        parent::__construct($name, $label, $messageErreur);
        $this->texte = '';
        $this->validatorFormatTel = new VF\TelFormatValidator();
    }

    /**
     * Création d'un validateur validatorFormatTel qui servira a tester si le format du numéro de téléphone est conforme
     * @return boolean
     */
    public function formatTest()
    {
        if (!$this->validatorFormatTel->testFormat($this->texte)) {
            $this->messageErreur = 'Numéro de téléphone invalide!';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Fonction qui permet de créer l'affichage de notre Widget
     * On retourne un string comportant le code HTML permettant de 
     * créer un champ de saisie de numéro de téléphone.
     * @return string
     */
    public function render()
    {
        $value = "<tr><td><label>" . $this->label . "</label></td><td><input type='tel' name='" . $this->name . "' value='" . $this->texte . "' /></td></tr>";
        if ($this->messageErreur != '') {
            $value .= "<tr><td COLSPAN='2'><span class='warning'>" . $this->messageErreur . "</span></td></tr>";
        }
        return $value;
    }

    /**
     * Fonction de validation du widget, ici elle appelera la fonction formatTest qui test le format du numéro de téléphone donné. 
     * @return boolean
     */
    public function isValid()
    {
        return $this->formatTest();
    }

}
