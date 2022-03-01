<?php

namespace dbGenerator\FormFields;

class DateFormField extends BaseFormField
{

    public function __construct(string $name)
    {
        $this->fieldName = $name;
        $this->attributes["type"] = "date";
    }

}
