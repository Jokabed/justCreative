<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes</title>
    <link rel="icon" type="image/jpg" href="./assets/img//pizza.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e47200;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 col-12">
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

<body>

    <div class="container">
        <?php
        session_start();
        if ($_SESSION['rol'] == "Administrador") {
        ?>
            <h1 class="text-center my-5">Órdenes</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pizzas</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = mysqli_connect("localhost", "root", "", "pizzeria");
                    if (!$mysqli) {
                        die("La conexión falló");
                    }
                    $resultado = $mysqli->query("SELECT
            p.id_pedidos, pi.nombre as pizza, us.nombre, p.total, p.nombre_persona as persona
        FROM
            pedidos p
        JOIN pizzas_pedido pp ON
            (p.id_pedidos = pp.id_pedido)
        JOIN pizzas PI ON
            (pp.id_pizza = PI.id_pizzas)
        JOIN usuarios us ON
            (p.id_usuario=us.id_usuarios) 
        order by p.id_pedidos desc");
                    $registroDB = array();
                    if ($resultado->num_rows > 0) {
                        while ($registro = $resultado->fetch_assoc()) {
                            array_push($registroDB, $registro);
                        }
                    }
                    for ($i = 0; $i < count($registroDB); $i++) {
                        echo "<tr>
                <th scope='row'>" . $registroDB[$i]['id_pedidos'] . "</th>
                <td>" . $registroDB[$i]['pizza'] . "  (" . $registroDB[$i]['persona'] . ")" . "</td>
                <td>" . $registroDB[$i]['nombre'] . "</td>
                <td>" . $registroDB[$i]['total'] . "</td>
            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div>
                <h1>No tienes los permisos necesario</h1>
            </div>
        <?php
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>