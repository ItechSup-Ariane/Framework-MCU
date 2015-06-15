<?php

namespace ItechSup\Widget;

/**
 * Abstract Class Widget
 * Classe abstraite Widget qui servira de parente 
 * @author Maxime
 */
abstract class Widget
{

    protected $name;
    protected $label;
    protected $messageErreur;

    protected function __construct($name, $label, $messageErreur)
    {
        $this->name = $name;
        $this->label = $label;
        $this->messageErreur = $messageErreur;
    }

    /**
     * 
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return string
     */
    function getLabel()
    {
        return $this->label;
    }

    /**
     * 
     * @param string
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * 
     * @param string
     */
    function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * 
     * @return string
     */
    function getMessageErreur()
    {
        return $this->messageErreur;
    }

    /**
     * 
     * @param string
     */
    function setMessageErreur($messageErreur)
    {
        $this->messageErreur = $messageErreur;
    }

    /*
     * Fonction vide, aucune validation réalisée à ce niveau
     * @return booleann
     */

    public function isValid()
    {
        return true;
    }

}
