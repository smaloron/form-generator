<?php

namespace dbGenerator\FormFields;

class BaseFormField {

    protected array $attributes = [
        "type" => "text"
    ];

    protected string $fieldName;

    public function __construct($name = null) {
        $this->fieldName = $name;
    }

    protected function getAttributeList(): string{
        $attributes = "";
        foreach ($this->attributes as $key => $val) {
            $attributes .= "$key = \"$val\" ";
        }
        return $attributes;
    }

    public function __toString(): string { 
        $attributes = $this->getAttributeList();
        return "<input $attributes name=\"{$this->fieldName}\">";
    }

}