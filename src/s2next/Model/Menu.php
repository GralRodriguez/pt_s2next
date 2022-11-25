<?php

declare(strict_types = 1);

namespace S2Next\Model;

class Menu {

    private $id;
    private $nombre;
    private $id_menu_padre = 0;
    private $descripcion;
    
    public function __construct($arr) {
        if(array_key_exists('id', $arr)) $this->id = $arr['id'];
        if(array_key_exists('nombre', $arr)) $this->nombre = $arr['nombre'];
        if(array_key_exists('id_menu_padre', $arr)) $this->id_menu_padre = $arr['id_menu_padre'];
        if(array_key_exists('descripcion', $arr)) $this->descripcion = $arr['descripcion'];
    }

    public function getId(){
        return $this->id;
    }
    /* El setter usualmente no se implementa
    public function setId($nombre) {
        $this->nombre = $nombre;
    }
    */

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getIdMenuPadre() {
        return $this->id_menu_padre;
    }

    public function setIdMenuPadre($id_menu_padre){
        $this->id_menu_padre = $id_menu_padre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'id_menu_padre' => $this->id_menu_padre,
            'descripcion' => $this->descripcion
        ];
    }

}