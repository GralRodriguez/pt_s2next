<?php

declare(strict_types = 1);

namespace S2Next;

use S2Next\Exceptions\ViewNotFoundException;

class View {

    public function __construct(protected string $view, protected array $params = []) {
    }

    public static function crear(string $view, array $params = []) : static {
        return new static($view, $params);
    }

    public function render(): string {
        $rutaVista = VIEW_DIR . '/' . $this->view . '.php';

        //print_r($rutaVista);
        
        if(! file_exists($rutaVista)) {
            throw new ViewNotFoundException();
        }
        
        // La vista se envia a un buffer y se retorna como un string, asi como se hace en los servlets de Java
        ob_start();

        include $rutaVista;
        
        return (string) ob_get_clean();
    }

    public function __toString() : string {
        return $this->render();
    }
}

?>