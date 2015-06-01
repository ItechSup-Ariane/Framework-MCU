<?php

namespace ItechSup\Widget\Liste;

use ItechSup\Widget\Liste\WidgetComboBox;
use ItechSup\PHPExcel\IOFactory;
/**
 * Description of WidgetMail
 *
 * @author Maxime
 */

class WidgetListeVilles extends WidgetComboBox {
    
    public function __construct($name,$label,$tab='',$messageErreur=''){
        parent::__construct($name,$label,$tab,$messageErreur);
    }
    
    public function addContent(){
        $objPHPExcel = IOFactory::load("C:\wamp\www\Framework\Librairies\insee.xlsx");
        $sheet = $objPHPExcel->getSheet(0);
        $column = 'A';
        $lastRow = $sheet->getHighestRow();
        for ($row = 2; $row <= $lastRow; $row++) {
            $this->tab[] = $sheet->getCell($column.$row)->getValue();
        }
    }
    
    public function render(){
        $value = "<tr><td><label>".$this->label."</label></td><td><select name='".$this->name."'>";
        foreach($this->tab as $t){
            $value.="<option value='".$t."'>".$t."</option>";
        }
        $value.="</select></td></tr>";
        if($this->messageErreur!=''){            
            $value .= "<tr><td COLSPAN='2'><span class='warning'>".$this->messageErreur."</span></td></tr>";
        }
        return $value;
    }
    
    public function isValid(){
        
    }
}
