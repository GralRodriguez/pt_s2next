<?php

declare(strict_types = 1);

namespace S2Next\Model\Db;

use S2Next\Model\Menu;

class MenuService {

    private $conn;

    public function __construct() {
        $this->conn = new \PDO(DB_STR_CONN, '', '', DB_OPTS);
    }


    public function obtenerMenus() {
        $stmt = $this->conn->query("SELECT * FROM menu;");
        $rows = $stmt->fetchAll();

        //print_r($rows);

        $menus = [];
        foreach($rows as $row) {
            $menu = new Menu($row);
            $menus[] = $menu;
        }

        return $menus;
    }

    /**
     * Have falta implementar un filtro para evitar ataques de inyeccion sql
     */
    public function obtenerMenuById($id) {
        $stmt = $this->conn->query("SELECT * FROM menu WHERE id = '$id';");
        $row = $stmt->fetch();

        //print_r($rows);
        $menu = new Menu($row);

        return $menu;
    }


    public function obtenerMenusPadre() {
        $stmt = $this->conn->query("SELECT * FROM menu WHERE id_menu_padre = '0';");
        $rows = $stmt->fetchAll();

        //print_r($rows);

        $menus = [];
        foreach($rows as $row) {
            $menu = new Menu($row);
            $menus[] = $menu;
        }

        return $menus;
    }

    public function obtenerMenusHijos() {
        $stmt = $this->conn->query("SELECT * FROM menu WHERE id_menu_padre <> '0' ORDER BY id_menu_padre;");
        $rows = $stmt->fetchAll();

        //print_r($rows);

        $menus = [];
        foreach($rows as $row) {
            $menu = new Menu($row);
            $menus[] = $menu;
        }

        return $menus;
    }


    public function registrarMenu(Menu $menu) {
        $stmt = $this->conn->prepare("INSERT INTO menu (nombre, id_menu_padre, descripcion) VALUES (:nombre, :id_menu_padre, :descripcion)");
        $stmt->bindValue(':nombre', $menu->getNombre());
        $stmt->bindValue(':id_menu_padre', $menu->getIdMenuPadre());
        $stmt->bindValue(':descripcion', $menu->getDescripcion());
        $stmt->execute();
    }


    public function editarMenu(Menu $menu) {
        $stmt = $this->conn->prepare("UPDATE menu SET nombre = :nombre, id_menu_padre = :id_menu_padre, descripcion = :descripcion WHERE id = :id");
        $stmt->bindValue(':nombre', $menu->getNombre());
        $stmt->bindValue(':id_menu_padre', $menu->getIdMenuPadre());
        $stmt->bindValue(':descripcion', $menu->getDescripcion());
        $stmt->bindValue(':id', $menu->getId());

        $stmt->execute();
        //print_r($menu->toArray());
        //print_r("menu editado");
    }


    public function eliminarMenu(string $id) {
        $stmt = $this->conn->prepare("DELETE FROM menu WHERE id = :id");

        $stmt->execute(['id' => $id]);
    }

}