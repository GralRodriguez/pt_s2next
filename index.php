<?php
    include_once 'bootstrap.php';
    initialConditons();
    /*
    try{
        $sqlite_path = './db/base.db';
        $pdo = new PDO("sqlite:" . $sqlite_path, '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
        // Obtenemos menus de la bd
        $menus = $pdo->exec("SELECT * FROM menu WHERE id_menu_padre = '0' ORDER BY id;");
        // Obtenemos submenus y los ordenamos respecto a su 
        
    }catch(Exception $ex){
        print_r($ex);
    }
    */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Hector Giovanni Rodriguez Ramos">
        <meta name="description" content="Prueba técnica solicitada por S2NEXT">
        <meta name="keywords" content="HTML, CSS, Javascript, PHP, Prueba Técnica, S2NEXT">
        <title>Index::S2NEXT</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-sm bg-dark ">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Evaluation</a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-sm">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle">Menu</a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">SubmenuItem</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3>Menu</h3>
                    <a class="btn btn-success" href="<?= "alta.php" ?>">
                        <i class="fa fa-plus"></i> Nuevo
                    </a>
                </div>
                <div class="col-md-1"></div>
                
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-sm table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Menu Padre</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-warning">
                                        Editar
                                    </button>
                                    <button class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>