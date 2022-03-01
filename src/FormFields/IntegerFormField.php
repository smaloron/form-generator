<?php

namespace dbGenerator\FormFields;

class IntegerFormField extends BaseFormField {

    public function __construct(string $name){
        $this->fieldName = $name;
        $this->attributes["type"] = "number";
    }

}