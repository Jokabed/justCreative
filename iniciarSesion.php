<?php
extract($_REQUEST);
$mysqli = new mysqli("localhost", "root", "", "pizzeria");
$resultados = $mysqli->query("SELECT
us.id_usuarios,
us.nombre,
tu.nombre as rol
FROM
usuarios us
LEFT JOIN
tipos_usuario tu
ON
us.id_tipo_usuario = tu.id_tipos_usuario
WHERE us.username  LIKE  '$user' AND us.password = '$password';");
$resultado = $resultados->fetch_assoc();
if ($resultado['id_usuarios']) {
    // Vamos a crear una sesion
    session_start();
    $_SESSION['id'] = $resultado['id_usuarios'];
    $_SESSION['rol'] = $resultado['rol'];
?>
    <script>
        window.location.href = "nuevoPedido.php"
    </script>
<?php
} else {
    echo "Lo sentimos, el usuario o contraseña son incorrectos";
}
