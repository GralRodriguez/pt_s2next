<?php
/**
 * En este archivo se realizan las comprobaciones de condiciones iniciales sugeridas en la prueba tecnica
 * Creación de base de datos (sqlite)
 * Creación de tablas
 * Creacion de usuario de inicio - (autocreado), se sugiere admin-admin como usuario-password
 */

 
 function initialConditons () {
    checkDatabase();
 }

 // 
 /**
  * Crear base de datos en un directorio especifico, se sugiere ./data/base.sqlite
  * Ademas llena con datos la base solicitada
  */
 function checkDatabase() {
    $directory = './data';
    $sqlite_path = $directory . '/base.db';
    $sqlite_opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    
    if(!file_exists($directory)){
        mkdir($directory, 0777, true);
        //crear base
        $base = $directory . '/data.db';
        if(!file_exists($base)) {
            $sqlite_opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $pdo = new PDO("sqlite:" . $sqlite_path, '', '', $sqlite_opts);
            $db->exec("CREATE TABLE menu(id INTEGER PRIMARY KEY, nombre TEXT, id_menu_padre INT, descripcion TEXT)");
            $db->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Catálogos', 0, 'Listado de Catálogos')");
            $db->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Tipos de Archivo', 1, 'Catálogo de Archivos')");
            $db->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Profesiones', 1, 'Listado de Profesiones')");
            $db->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Marcas', 0, 'Listado de Marcas de Autos')");
            $db->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('SEAT', 4, 'Marca Seat')");
            $db->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('BMW', 4, 'Marca bmw')");
        }
    }

 }

 function insertMenu(Menu $m) {
    //$this
 }

/*
 public class ServiceDB {
    private $db;
    
    
 }
 */