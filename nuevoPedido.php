<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo pedido</title>
    <link rel="icon" type="image/jpg" href="./assets/img//pizza.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e47200;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-12">
                    <li class="nav-item ms-3">
                        <a class="nav-link text-white" style="font-weight: bold; font-size: 20px" aria-current="page" href="./nuevoPedido.php">Crear orden</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link text-white" style="font-weight: bold; font-size: 20px" href="./ordenes.php">Todos los pedidos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center my-5">Agregar pedido</h1>
        <form class="row col-12 mx-auto my-5" action="insertPedido.php" method="POST">
            <div class="col-sm-12 col-md-3 mt-3">
                <select class="form-control" name="id_pizza" value="">
                    <option value="" disabled selected>Selecciona una pizza</option>
                    <?php
                    $mysqli = mysqli_connect("localhost", "root", "", "pizzeria");
                    if (!$mysqli) {
                        die("La conexión falló");
                    }
                    $resultado = $mysqli->query("SELECT * from pizzas");
                    $registroDB = array();
                    if ($resultado->num_rows > 0) {
                        while ($registro = $resultado->fetch_assoc()) {
                            array_push($registroDB, $registro);
                        }
                    }
                    for ($i = 0; $i < count($registroDB); $i++) {
                        echo "<option value='" . $registroDB[$i]['id_pizzas'] . "'>" . $registroDB[$i]['nombre'] . " $" . $registroDB[$i]['precio'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-12 col-md-3 mt-3">
                <input type="text" class="form-control" placeholder="Nombre del cliente" name="nombre_persona">
            </div>
            <button class="col-sm-12 col-md-3 mt-3 btn orange text-white rounded">Agregar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>