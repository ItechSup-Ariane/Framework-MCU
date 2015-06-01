<?php

namespace ItechSup\Widget\Texte\TexteAvance;

use ItechSup\Widget\Texte\WidgetTexte;

/**
 * Description of WidgetMail
 *
 * @author Maxime
 */

class WidgetCP extends WidgetTexte {
    
    public function __construct($name,$label,$messageErreur=''){
        parent::__construct($name,$label,$messageErreur);
        $this->texte='';
    }
    
    public function addContent(){
        $objPHPExcel = PHPExcel_IOFactory::load("../Librairies/insee.xlsx");
        $sheet = $objPHPExcel->getSheet(0);
        foreach($sheet->getRowIterator() as $row) {
 
        foreach ($row->getCellByColumn() as $cell) {
      
            print_r($cell->getValue());
            }
        }
    }
    
    public function render(){
        
        $value = "<tr><td><label>".$this->label."</label></td><td><input type='text' name='".$this->name."' value='".$this->texte."' /></td></tr>";
        
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        
        return $value;
    }
    
    public function isValid(){
        
    }
}
