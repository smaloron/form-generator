<?php
namespace dbGenerator\FormFields;

use dbGenerator\FormFields\BaseFormField;

class SelectFormField extends BaseFormField {

    public function __construct(string $name){
        $this->fieldName = $name;
        unset($this->attributes["type"]);
    }

    public function __toString(): string { 
        $attributes = $this->getAttributeList();
        return "<select $attributes name=\"{$this->fieldName}\"> </select>";
    }

}