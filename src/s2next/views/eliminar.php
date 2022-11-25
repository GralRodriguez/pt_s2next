<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Hector Giovanni Rodriguez Ramos">
        <meta name="description" content="Prueba técnica solicitada por S2NEXT">
        <meta name="keywords" content="HTML, CSS, Javascript, PHP, Prueba Técnica, S2NEXT">
        <title>Vista Index::S2NEXT</title>
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
                    
                </div>
                <div class="col-md-1"></div>
                
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>