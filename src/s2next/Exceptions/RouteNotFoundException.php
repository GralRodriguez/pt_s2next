<?php

declare(strict_types = 1);

namespace S2Next;

class RouteNotFoundException extends \Exception {

    protected $message = "404 ruta no encontrada";

}