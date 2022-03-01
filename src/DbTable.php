<?php
namespace dbGenerator;

class DbTable {

    private string $tableName;

    private array $columns = [];

    public function __construct(string $tableName){
        $this->tableName = $tableName;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * Set the value of tableName
     *
     * @return  self
     */ 
    public function setTableName($tableName): self
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get the value of columns
     */ 
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Set the value of columns
     *
     * @return  self
     */ 
    public function setColumns($columns): self
    {
        $this->columns = $columns;

        return $this;
    }

    public function addColumn(array $infos){
        $this->columns[] = new DbColumn($infos);
    }
}