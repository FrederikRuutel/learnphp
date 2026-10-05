<?php
namespace App;

use PDO;
use PDOException;

class DB {
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("sqlite:" . __DIR__ . '/../db.sqlite');
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function all($table, $class) {
        $sql = "SELECT * FROM $table";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetchAll();
    }

    public function insert($table, $fields) {
        $fieldNames = array_keys($fields);
        $fieldNamesText = implode(', ', $fieldNames);
        $fieldValuesText = implode("', '", $fields);
        
        $sql = "INSERT INTO $table ($fieldNamesText)
                VALUES ('$fieldValuesText')";
        $this->conn->exec($sql);
    }

    public function find($table, $class, $id) {
        $sql = "SELECT * FROM $table WHERE id=$id";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetch();
    }

    public function where($table, $class, $fieldName, $value) {
        $sql = "SELECT * FROM $table WHERE $fieldName='$value'";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetchAll();
    }

    public function update($table, $fields, $id) {
        $updateText = '';
        foreach($fields as $name=>$value) {
            $updateText .= "$name='$value', ";
        }
        $updateText = substr($updateText, 0, -2);
        $sql = "UPDATE $table
                SET $updateText
                WHERE id=$id";
        $this->conn->exec($sql);
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id=$id";
        $this->conn->exec($sql);
    }
}