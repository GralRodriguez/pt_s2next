<?php

declare(strict_types = 1);

namespace S2Next;

/**
 * Clase que administra las rutas consultadas mediante el browser.
 * @author Héctor Giovanni Rodríguez Ramos - gral.rodriguezr@gmail.com
 */
class Router {

    //Concentrado de rutas
    private array $rutas;

    public function registrar(string $tipo, string $ruta, callable | array $accion) : self {
        $this->rutas[$tipo][$ruta] =  $accion;
        
        return $this;
    }

    public function get(string $ruta, callable | array $accion) : self {
        return $this->registrar('GET', $ruta, $accion);
    }

    public function post(string $ruta, callable | array $accion) : self {
        return $this->registrar('POST', $ruta, $accion);
    }

    public function rutas() : array {
        return $this->rutas;
    }

    public function resolve(string $uri, string $tipo) { // /        
        $url = explode('?', $uri);
        $ruta = $url[0]; // '/'

        $pairs = [];
        $paramsurl = [];
        if(count($url) == 2) { // esto recibe algo asi: id=1&pid=3
            //print_r("Hay parametros!");
            $pairs = explode('&', $url[1]); // se obtienen los parametros: id=1, p=2
            if(count($pairs) > 0) {
                foreach($pairs as $pair ) {
                    $paramsurl[] = [explode('=', $pair)[0] => explode('=', $pair)[1]];
                }
            }
        }

        $accion = $this->rutas[$tipo][$ruta] ?? null; // El resultado es [clase, 'index']

        // La accion puede no existir, lanzar exception
        if(!$accion) {
            throw new RouteNotFoundException();
        }

        // la accion existe
        if(is_callable($accion)) {
            return call_user_func($accion);
        }

        if(is_array($accion)) {
            // Se registro en el router como [clase, accion] se hace destructuring
            [$clase, $metodo] = $accion;

            if(class_exists($clase)){
                $clase = new $clase();

                if(method_exists($clase, $metodo)){
                    return call_user_func_array([$clase, $metodo], $paramsurl);
                }
            }
        }
        
        throw new RouteNotFoundException();
    }

}