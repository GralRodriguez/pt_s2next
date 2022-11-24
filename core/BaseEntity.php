<?php

require_once("ConnectionDB.php");

class BaseEntity {
    private $table;
    private $db;
    private $connection;

    public function __construct($table) {
        $this->table = (string) $table;

        $this->connection = new ConnectionDB();
        $this->db = $this->connection->connect();
    }

    public function getConnection() {
        return $this->connection;
    }

    public function getDb() {
        return $this->db;
    }

    // Metodos básicos de un CRUD

    public function getAll() {
        $rows = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC;")->fetchAll();
        return $rows;
    }

    public function getById($id) {
        $row = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC;")->fetch();
        return $row;
    }

    public function getBy($column, $value) {
        $rows = $this->db->query("SELECT * FROM $this->table WHERE $column = '$value';");
        return $rows;
    }

    public function deleteById($id) {
        $result = $this->db->query("DELETE FROM $this->table WHERE id = $id");

    }

    public function deleteBy($column, $value) {
        $result = $this->db->query("SELECT * FROM $this->table WHERE $column = '$value';");
        
    }
}