<?php
namespace dbGenerator;

use dbGenerator\DbTable;
use dbGenerator\FormFields\BaseFormField;
use dbGenerator\FormFields\IntegerFormField;
use dbGenerator\FormFields\DateFormField;
use dbGenerator\FormFields\FloatFormField;
use dbGenerator\FormFields\SelectFormField;

class FormGenerator {

    private DbTable $table;

    private array $sqlTypesMap = [
        "varchar" => "text",
        "char" => "text",
        "int" => "int",
        "mediumint" => "int",
        "smallint" => "int",
        "tinyint" => "int",
        "bigint" => "int",
        "text" => "textarea",
        "decimal" => "float",
        "date" => "date",
        "datetime" => "date"
    ];

    private array $fieldsMap = [
        "text" => BaseFormField::class,
        "int" => IntegerFormField::class,
        "date" => DateFormField::class,
        "float" => FloatFormField::class
    ];

    public function __construct(DbTable $table) {
        $this->table = $table;
    }

    private function getFormField(DbColumn $col){
        $type = $this->sqlTypesMap[$col->getSqlType()];
        if(array_key_exists($type, $this->fieldsMap)){
            //var_dump($col);
            if($col->isForeignKey()){
                $class = SelectFormField::class;
            } else {
                $class = $this->fieldsMap[$type];
            }    
        } else {
            $class = BaseFormField::class;
        }
        
        $instance = new $class($col->getColumnName());
        return $instance;
    }

    public function render(): string {
        $html = "<form method=\"post\">";

        foreach($this->table->getColumns() as $column) {
            $label = str_replace("_", " ", $column->getColumnName());
            $html .= "<div>";
            $html .= "<label>$label</label>";
            
            $html .= $this->getFormField($column);
            
            $html .= "</div>";
        }

        $html .= "<div><button type=\"submit\">Valider</button></div>";

        $html .= "</form>";

        return $html;
    }

    public function save():void {
        $path = "output/". $this->table->getTableName(). ".html";
        file_put_contents($path, $this->render());
    }

}