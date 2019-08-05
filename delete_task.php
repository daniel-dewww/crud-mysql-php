<?php 

include("db.php");


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "DELETE FROM task  WHERE id = $id";

$resultado = mysqli_query($conexion, $query);
if (!resultado) {
	die("Query failed"); 
 }
 $_SESSION['message'] =  "Tarea removida";
  $_SESSION['message-type'] =  "danger";

 header("Location: index.php");
}
 ?>