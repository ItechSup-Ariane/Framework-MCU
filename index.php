<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php    
        spl_autoload_register(function ($class) {

            // project-specific namespace prefix
            $prefix = 'ItechSup';

            // base directory for the namespace prefix
            $base_dir = __DIR__.'/Classes' ;

            // does the class use the namespace prefix?
            $len = strlen($prefix);
               if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
                return;
            }

        // get the relative class name
            $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // if the file exists, require it
            if (file_exists($file)) {
                require $file;
            }
        });
    ?>
        
        <form name='formulaireSimple' method='POST' action=''>
            <?PHP
                use ItechSup\Formulaire;
                use ItechSup\Widget\Texte as WT;
                use ItechSup\Widget\Texte\TexteAvance as WTA;
                use ItechSup\Widget\Liste as WL;
                use ItechSup\Widget\Choix as WC;
                
                $formulaire = new Formulaire('Premier Formulaire');

                $formulaire->addWidget($widgetTexte = new WT\WidgetTexte('Test','Texte'));

                $formulaire->addWidget($widgetTel = new WTA\WidgetTel('Tel','Tel'));      

                $formulaire->addWidget($widgetURL = new WTA\WidgetURL('URL','URL'));

                $formulaire->addWidget($widgetDate = new WTA\WidgetDate('Date','Date'));   

                $formulaire->addWidget($widgetMail = new WTA\WidgetMail('Mail','Mail'));

                $formulaire->addWidget($widgetAdresse = new WT\WidgetTexte('Adresse','Adresse'));

                $formulaire->addWidget($widgetCP = new WTA\WidgetCP('CP','CP'));
                
                $widgetVille = new WL\WidgetListeVilles('Ville','Ville');
                $widgetVille->addContent();
                $formulaire->addWidget($widgetVille);
                

                $formulaire->addWidget($widgetPassword = new WTA\WidgetPassword('Password','Password'));

                $formulaire->addWidget($widgetPasswordConfirm = new WTA\WidgetPassword('PasswordConfirm','PasswordConfirm',$widgetPassword));
                
                if(sizeof($_POST)>0){
                    $formulaire->bind($_POST);
                    $formulaire->isValid();
                }
                
                echo $formulaire->afficherWidgets();

            ?>
            <input type='submit' value='Envoyer'>
        </form>
    </body>
</html>
