<?php

namespace dbGenerator\FormFields;

class FloatFormField extends BaseFormField
{

    public function __construct(string $name)
    {
        $this->fieldName = $name;
        $this->attributes["type"] = "number";
        $this->attributes["step"] = ".1";

    }

}
