<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vista Crear::S2NEXT</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-sm bg-dark ">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Evaluation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav me-auto mb-2 mb-sm">
                        <?php foreach($this->params['menus'] as $menu) : ?>
                            <?php if($menu->getIdMenuPadre() == "0") { ?>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $menu->getDescripcion(); ?>
                                </a>
                                <ul class="dropdown-menu">
                                <?php foreach($this->params['menus'] as $menu2) : ?>
                                    <?php if($menu2->getIdMenuPadre() == $menu->getId()) { ?>
                                    <li>
                                        <a href="/mostrar?id=<?= $menu2->getId(); ?>" class="dropdown-item">
                                            <?php echo $menu2->getDescripcion(); ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                <?php endforeach; ?>
                                </ul>
                            </li>
                            <?php } ?>
                        <?php endforeach; ?> 
                    </ul>
                    
                </div>
            </div>
        </nav>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div>
                        <h3>Registrar nuevo elemento</h3>
                        <a class="btn btn-primary" href="/">
                            <i class="fa fa-plus"></i> Home
                        </a>
                    </div>
                    <div>
                        <form action="/crear" method="post" enctype="application/x-www-form-urlencoded">
                            <div class="form-group row">
                                <label for="id_menu_padre" class="col-form-label col-md-2">Menu Padre</label>
                                <div class="col-md-4">
                                    <select name="id_menu_padre" id="id_menu_padre" class="form-select">
                                        <option value="0">Seleccione opcion</option>
                                        <?php foreach($this->params['menus'] as $menu) : if($menu->getIdMenuPadre() == "0") {?>
                                        <option value="<?= $menu->getId(); ?>"><?= $menu->getDescripcion(); ?></option>
                                        <?php } endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-form-label col-md-2">Nombre</label>
                                <div class="col-md-4">
                                    <input name="nombre" type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-form-label col-md-2">Descripcion</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check"></i> Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>