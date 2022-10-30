<?php
extract($_REQUEST);
// Consultamos el precio de la pizza
$mysqli = new mysqli("localhost", "root", "", "pizzeria");
$resultado = $mysqli->query("SELECT * FROM pizzas where  id_pizzas=$id_pizza"); // busco la pizza que tiene el id que se seleccionó para saber el precio
$pizza = $resultado->fetch_assoc(); // obtengo la pizza
// Extraigo el rol del usuario de la sesión para insertarlo en el query de pedido
session_start();
$id_usuario = $_SESSION['id'];
// // Inserto el pedido
$pedido = $mysqli->query("INSERT INTO `pedidos`(`nombre_persona`, `total`, `fecha`, `id_usuario`) VALUES ('$nombre_persona', $pizza[precio],'0000-00-00 00:00',$id_usuario)");
$nuevoPedido = $mysqli->query("SELECT * FROM pedidos order by id_pedidos desc limit 1"); // Busco el pedido creado
$ped = $nuevoPedido->fetch_assoc(); // obtengo el pedido creado
// // Inserto mi pizza del pedido
$pizzaPedido = $mysqli->query("INSERT INTO `pizzas_pedido`( `id_pizza`, `id_pedido`) VALUES ($id_pizza, $ped[id_pedidos]);");
if ($ped['id_pedidos']) { // si tiene id de pedidos
?>
    <!-- Quiere decir que si se pudo crear el pedido entonces mando un aviso y redirecciono a nuevo pedido -->
    <script>
        alert("Pedido creado con éxito")
        window.location.href = "./nuevoPedido.php";
    </script>
<?php
} else {
    // Quiere decir que no se pudo crear
    echo "No se pudo crear el pedido";
    echo "<a href='/nuevoPedido.php'>Regresar</a>";
}
