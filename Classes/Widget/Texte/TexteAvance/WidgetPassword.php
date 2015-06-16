<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\Widget\Texte\TexteAvance;

use ItechSup\Widget\Texte\WidgetTexte;
use ItechSup\Validator\Concordance\TexteIdentiqueValidator;
use ItechSup\Validator\Format\PasswordFormatValidator;

/**
 * Description of WidgetPassword
 *
 * @author Maxime
 */
class WidgetPassword extends WidgetTexte
{

    private $widgetCopie;
    private $identiquePasswordValidator;
    private $formatPasswordValidator;

    public function __construct($name, $label, $widgetCopie = 'null', $messageErreur = '')
    {
        parent::__construct($name, $label, $messageErreur);
        $this->texte = '';
        $this->widgetCopie = $widgetCopie;
        $this->identiquePasswordValidator = new TexteIdentiqueValidator();
        $this->formatPasswordValidator = new PasswordFormatValidator();
    }

    /**
     * Création d'un validateur identiquePasswordValisator 
     * qui servira a tester si le mot de passe est bien le meme 
     * que celui donné lors de la confirmation
     * @return boolean
     */
    public function concordanceTest()
    {
        if (!$this->identiquePasswordValidator->testConcordance
                ($this->texte, $this->widgetCopie->getTexte())) {
            $this->messageErreur = 'Les mots de passe ne sont pas similaires!';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Création d'un validateur formatPasswordValidator 
     * qui servira a tester si le format du mot de passe est conforme
     * @return boolean
     */
    public function formatTest()
    {
        if (!$this->formatPasswordValidator->testFormat($this->texte)) {
            $this->messageErreur.='Le mot de passe doit contenir au minimum'
                . ' au 8 caractères dont un chiffre,'
                . ' une lettre et un caractère spécial';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Fonction qui permet de créer l'affichage de notre Widget
     * On retourne un string comportant le code HTML permettant de 
     * créer un champ de saisie de mot de passe.
     * @return string
     */
    public function render()
    {
        $value = "<tr><td><label>" . $this->label . "</label></td>"
            . "<td><input type='password' name='" . $this->name .
            "' value='" . $this->texte . "' /></td></tr>";
        if ($this->messageErreur != '') {
            $value .= "<tr><td COLSPAN='2'><span class='warning'>"
                . $this->messageErreur . "</span></td></tr>";
        }
        return $value;
    }

    /**
     * Fonction de validation du widget, 
     * ici elle appelera la fonction formatTest qui test 
     * le format du mot de passe donné. 
     * @return boolean
     */
    public function isValid()
    {
        if ($this->widgetCopie != 'null') {
            return $this->concordanceTest();
        } else {
            return $this->formatTest();
        }
    }

}
