<?php 

include("db.php");



if('save_task')  {
  $title = $_POST['title'];
  $description = $_POST['description'];
  

 $query = "INSERT INTO task(title, description) VALUES('$title', '$description')"; 
$resultado = mysqli_query($conexion,$query);//realizar consulta
if (!$resultado) {
	die("Query failed");
}

 $_SESSION['message'] = 'Tarea guardada';

 $_SESSION['message-type'] = 'success';

header("Location: index.php");
}
 ?> 