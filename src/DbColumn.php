<?php

namespace dbGenerator;

class DbColumn {

    private string $columnName;

    private string $sqlType;

    private bool $primary;

    private bool $nullable;

    private bool $autoIncrement;

    private bool $foreignKey;

    public function __construct(array $infos){
        $this->columnName = $infos["Field"];
        $this->sqlType = $this->getCleanType($infos["Type"]);
        $this->primary = $infos["Key"] == "PRI";
        $this->foreignKey = $infos["Key"] == "MUL";
        $this->nullable = $infos["Null"] == "YES";
        $this->autoIncrement = $infos["Extra"] == "auto_increment";
    }

    private function getCleanType(string $type){
        $type = str_replace("unsigned", "", $type);
        if(str_contains($type,")")){
            preg_match("/([a-z0-9_]+)(\([0-9,]+\))/", $type, $matches);
            return $matches[1];
        } else {
            return $type;
        }   
    }


    /**
     * Get the value of columnName
     */ 
    public function getColumnName(): string
    {
        return $this->columnName;
    }

    /**
     * Set the value of columnName
     *
     * @return  self
     */ 
    public function setColumnName($columnName): self
    {
        $this->columnName = $columnName;

        return $this;
    }

    /**
     * Get the value of sqlType
     */ 
    public function getSqlType(): string
    {
        return $this->sqlType;
    }

    /**
     * Set the value of sqlType
     *
     * @return  self
     */ 
    public function setSqlType($sqlType): self
    {
        $this->sqlType = $sqlType;

        return $this;
    }

    /**
     * Get the value of primary
     */ 
    public function isPrimary(): bool
    {
        return $this->primary;
    }

    /**
     * Set the value of primary
     *
     * @return  self
     */ 
    public function setPrimary($primary): self
    {
        $this->primary = $primary;

        return $this;
    }

    /**
     * Get the value of nullable
     */ 
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * Set the value of nullable
     *
     * @return  self
     */ 
    public function setNullable($nullable): self
    {
        $this->nullable = $nullable;

        return $this;
    }

    /**
     * Get the value of autoIncrement
     */ 
    public function isAutoIncrement(): bool
    {
        return $this->autoIncrement;
    }

    /**
     * Set the value of autoIncrement
     *
     * @return  self
     */ 
    public function setAutoIncrement($autoIncrement): self
    {
        $this->autoIncrement = $autoIncrement;

        return $this;
    }

    /**
     * Get the value of foreignKey
     */ 
    public function isForeignKey(): bool
    {
        return $this->foreignKey;
    }

    /**
     * Set the value of foreignKey
     *
     * @return  self
     */ 
    public function setForeignKey($foreignKey): self
    {
        $this->foreignKey = $foreignKey;

        return $this;
    }
}