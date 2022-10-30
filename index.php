<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzería</title>
    <link rel="icon" type="image/jpg" href="./assets/img//pizza.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="img1">
    <div class="container">
        <form class="card col-11 col-md-6 col-lg-4 mx-auto p-4" style="margin-top: 15%;" action="iniciarSesion.php" method="POST">
            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary orange">Iniciar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- <script>
        function inicioSesion(event) {
            event.preventDefault();
            alert("Hola");
            $.ajax({
                url: "./iniciarSesion.php",
                data: {
                    user: document.getElementById("user").value,
                    password: document.getElementById("password").value
                },
                type: "POST",
                success: (data) => {
                    debugger;
                    window.location.href = "nuevoPedido.php"
                },
                error: (error) => {
                    alert("Usuario o contraseña incorrectos")
                }
            })
        }
    </script> -->

</body>

</html>