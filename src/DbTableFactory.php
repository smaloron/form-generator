<?php
namespace dbGenerator;

use \PDO;
use dbGenerator\DbTable;

class DbTableFactory {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function makeTable(string $tableName): DbTable{
        $sql = "DESCRIBE `$tableName`;";
        $resultSet = $this->pdo->query($sql);
        $data = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        $resultSet = null;

        $table = new DbTable($tableName);

        foreach($data as $row){
            $table->addColumn($row);
        }

        return $table;
    }

}