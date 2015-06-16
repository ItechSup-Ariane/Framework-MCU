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
class Formulaire
{

    private $name;
    private $listeWidget;

    public function __construct($name)
    {
        $this->name = $name;
        $this->listeWidget = array();
    }

    /**
     * Fonction qui ajoute un widget à la liste de widget du formulaire
     * @param Widget $widget
     * @return Widget
     */
    public function addWidget($widget)
    {
        $this->listeWidget[$widget->getName()] = $widget;
        return $widget;
    }

    /**
     * On complete les champs avec les valeurs qui y ont été données
     * précedemment par l'utilisateur.
     * Pour ce faire on appelle soit la méthode setTexte de chaque widget
     * pour les widgets de type texte et texte avancé
     * Ou la méthode bind pour les autres widgets
     * @param array $post
     */
    public function bind($post)
    {
        //Pour chaque objet Widget,on renseigne le texte,
        //les choix précédemment fait
        foreach ($post as $key => $value) {
            //Si la classe possède la méthode setTexte(),
            //valable pour les widget texte et texte avancé, on l'appelle
            if (method_exists($this->listeWidget[$key], 'setTexte')) {
                $this->listeWidget[$key]->setTexte($value);

                //Sinon on appelle la méthode bind
            } else {
                $this->listeWidget[$key]->bind($value);
            }
        }
    }

    /**
     * La fonction qui va, pour chaque widget du formulaire,
     *  appeler leur fonction isValid, qui servira a valider les données entrées
     */
    public function isValid()
    {
        foreach ($this->listeWidget as $w) {
            $w->isValid();
        }
    }

    /**
     * Fonction qui renvoi une chaine html représentant
     * un tableau composé de chaque widget
     * Pour ce faire la fonction fait appel à la fonction render de chaque widget
     *  qui elle renvoi une chaine représentant le widget au format html
     * @return string
     */
    public function afficherWidgets()
    {
        $value = '<div id="listeWidget"><TABLE>';
        foreach ($this->listeWidget as $w) {
            $value.=$w->render();
        }
        $value.='</TABLE></div>';
        return $value;
    }

}
