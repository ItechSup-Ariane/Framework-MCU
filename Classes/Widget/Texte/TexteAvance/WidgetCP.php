<?php

namespace ItechSup\Widget\Texte\TexteAvance;

use ItechSup\Widget\Texte\WidgetTexte;

/**
 * Class WidgetCP
 * Classe permettant de créer un widget qui correspondra au code postal
 * 
 * @author Maxime
 */
class WidgetCP extends WidgetTexte
{

    private function __construct($name, $label, $messageErreur = '')
    {
        parent::__construct($name, $label, $messageErreur);
        $this->texte = '';
    }

}
