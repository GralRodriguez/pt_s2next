<?php

declare(strict_types = 1);

namespace S2Next\Model\Db;

class DbService {

    public function condicionesIniciales() : void {
        if(!file_exists(DB_DIR)){
            $this->iniciarBase();
            // Se ha instanciado una base sqlite
            //print_r('Se ha instanciado una base sqlite');
        }
    }

    private function iniciarBase() : void {
        $pdo = new \PDO(DB_STR_CONN, '', '', DB_OPTS);

        $pdo->exec("CREATE TABLE menu(id INTEGER PRIMARY KEY, nombre TEXT, id_menu_padre INT, descripcion TEXT)");
        $pdo->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Catálogos', 0, 'Listado de Catálogos')");
        $pdo->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Tipos de Archivo', 1, 'Catálogo de Archivos')");
        $pdo->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Profesiones', 1, 'Listado de Profesiones')");
        $pdo->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('Marcas', 0, 'Listado de Marcas de Autos')");
        $pdo->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('SEAT', 4, 'Marca Seat')");
        $pdo->exec("INSERT INTO menu(nombre, id_menu_padre, descripcion) VALUES('BMW', 4, 'Marca bmw')");

        $pdo = null;
    }

}