<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php include_once('./template/navbar.php'); ?>

    <form action="">
        <div class="form-group row">
            <label for="" class="col-form-label col-md-2">Menu Padre</label>
            <div class="col-md-4">
                <select name="parent" id="parent">
                    <option value="0">Seleccione opcion</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="Nombre" class="col-form-label col-md-2">Nombre</label>
            <div class="col-md-4">
                <input name="nombre" type="text" class="form-control" />
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-form-label col-md-2">Descripcion</label>
            <div class="col-md-4">
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
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
</body>
</html>