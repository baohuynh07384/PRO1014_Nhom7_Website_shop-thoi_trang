<?php

namespace App\Models;

use App\Models\CrudInterface;
use App\Models\Database;
use PDO;
use Exception;
use App\Models\QueryBuilder;
use PDOException;
abstract class BaseModel implements CrudInterface
{
    use QueryBuilder;

    private $_connection;

    protected $name = "BaseModel";
    private $_query;
    
    protected $lastInsertedId;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    abstract public function getAllWithPaginate(int $number, int $offset);

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->tableName";

        return $this;
    }


    public function orderBy( $field,  $order = 'ASC')

    {
        $this->_query = $this->_query . " ORDER BY " . $order;

        return $this;
    }

    public function get()
    {
        $stmt = $this->_connection->PDO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOne($id)
    {
        return [];
    }


    public function limit($number, $offset = 0)
    {
        $stmt = $this->_connection->PDO()->prepare($this->_query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function update( array $data  ){
    //     return true;
    // }

    public function insertData($table, $data)
    {
        if (!empty($data)) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fieldStr .= $key . ',';
                $valueStr .= "'" . $value . "',";
            }

            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');
            $sql = "INSERT INTO  $table ($fieldStr) VALUES ($valueStr)";
            $status = $this->query($sql);
         
            if (!$status)
                return false;
        }
        return true;
    }

    public function updateData($table, $data, $condition = '')
    {
        if (!empty($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                if ($value === '' || $value === null) {
                    $updateStr .= "$key=NULL,";
                } else {
                    $updateStr .= "$key='$value',";
                }
            }
            $updateStr = rtrim($updateStr, ',');
            $sql = "UPDATE $table SET $updateStr";
            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            }
            $status = $this->query($sql);
            if (!$status)
                return false;
        }
        return true;
    }

    public function deleteData($table, $condition = ''): bool
    {
        $sql = 'DELETE FROM ' . $table;
        if (!empty($condition)) {
            $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        }
        $status = $this->query($sql);
        if (!$status)
            return false;
        return true;
    }


    public function query($sql)
    {
        try {
            $conn = $this->_connection->PDO();
            $statement = $conn->prepare($sql);
            $statement->execute();
            $this->lastInsertedId = $conn->lastInsertId();
            return $statement;
            } catch (Exception $ex) {
            $mess = $ex->getMessage();
            echo $mess; 
        }
    }
    public function getInsertLastId(){
        return $this->lastInsertedId;
       
    }
}
