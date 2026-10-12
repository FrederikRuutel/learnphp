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
        $placeholders = implode(', ', array_fill(0, count($fields), '?'));
        $sql = "INSERT INTO $table ($fieldNamesText) VALUES ($placeholders)";
        $statement = $this->conn->prepare($sql);
        $statement->execute(array_values($fields));
    }

    public function find($table, $class, $id) {
        $sql = "SELECT * FROM $table WHERE id = ?";
        $result = $this->conn->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetch();
    }

    public function where($table, $class, $fieldName, $value) {
        $sql = "SELECT * FROM $table WHERE $fieldName = ?";
        $result = $this->conn->prepare($sql);
        $result->execute([$value]);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetchAll();
    }

    public function update($table, $fields, $id) {
        $assignments = [];
        foreach (array_keys($fields) as $name) {
            $assignments[] = "$name = ?";
        }
        $updateText = implode(', ', $assignments);
        $sql = "UPDATE $table SET $updateText WHERE id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->execute([...array_values($fields), $id]);
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->execute([$id]);
    }
}