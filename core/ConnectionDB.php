<?php
/**
 * 
 */
class ConnectionDB {

    private $sqlite_path = '../db/base.db';
    private $sqlite_opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    public function __construct() {
        
    }

    public function connect() {
        $conn = new PDO("sqlite:" . $sqlite_path, '', '', $sqlite_opts);

        return $conn;
    }

}