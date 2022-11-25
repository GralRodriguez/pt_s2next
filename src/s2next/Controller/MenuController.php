<?php

declare(strict_types = 1);

namespace S2Next\Controller;

use S2Next\View;
use S2Next\Model\Db\MenuService;
use S2Next\Model\Menu;

class MenuController {

    private $menuService = null;
    private $menus = null;

    public function __construct() {
        $this->menuService = new MenuService();

        $this->menus = $this->menuService->obtenerMenus();
    }


    public function index() : View {
        //print_r($menus);
        return View::crear('index', ['menus' => $this->menus]);
    }

    public function crear() : View {
        //return (new View('crear'))->render();
        return View::crear('crear', ['menus' => $this->menus]);
    }

    public function crearpost() : View {
        $menu = new Menu($_POST);
        /*
        $menu->setNombre($_POST['nombre']);
        $menu->setIdMenuPadre($_POST['id_menu_padre']);
        $menu->setDescripcion($_POST['descripcion']);
        */
        $this->menuService->registrarMenu($menu);
        //print_r("Se ha registrado un menu");
        return View::crear('crearpost', ['menus' => $this->menus]);
    }

    public function actualizar() : View {
        // En esta vista se muestra el formulario, enviamos los datos via post
        $menu = $this->menuService->obtenerMenuById($_POST['id']);
        return View::crear('actualizar', ['menus' => $this->menus, 'menu_up' => $menu]);
    }

    public function actualizarpost() {
        // En esta vista se muestra el formulario, enviamos los datos via post
        //$menu = $this->menuService->obtenerMenuById($_POST['id']);
        $menu = new Menu($_POST);
        $this->menuService->editarMenu($menu);

        $menuActual = $this->menuService->obtenerMenuById($_POST['id']);

        //print_r("Se ha actualizado un menu");
        return View::crear('actualizarpost', ['menus' => $this->menus, 'menuAntes'=> $_POST, 'menuAhora' => $menuActual]);
    }

    public function mostrar(array $params = []) : View {
        //var_dump($_REQUEST);
        //var_dump($_GET);
        //var_dump($_POST);
        //var_dump($params);
        /*
        $menuActual = $this->menuService->obtenerMenuById($params['id']);
        $submenus = $this->menuService->obtenerMenuById($params['id']);
        */
        $id = null;
        if(array_key_exists('id', $params)) $id = $params['id'];
        //return (new View('mostrar'))->render();
        return View::crear('mostrar', ['menus' => $this->menus, 'id' => $id]);
    }

    public function eliminar() : View {
        //var_dump($_POST);
        //var_dump($this->params);
        //return (new View('eliminar'))->render();
        $this->menuService->eliminarMenu($_POST['id']);

        return View::crear('eliminar', ['menus' => $this->menus]);
    }
    

}