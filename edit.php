<?php 
include("db.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM task WHERE id = $id";


	$resultado = mysqli_query($conexion , $query);
	if (mysqli_num_rows($resultado) == 1) {
			
    $row = mysqli_fetch_array($resultado);
    $title = $row['title'];
     $title = $row['title'];
     $description = $row['description'];
	}
}
if (isset($_POST['update'])) {
	$id = $_GET['id'];
	$description = $_POST['description'];
	echo $title;
	echo $description;
	echo $id;
	$query = " UPDATE task set  title= '$title' , description = '$description' WHERE id = $id" ;
	$resultado = mysqli_query($conexion, $query);
   $_SESSION['message'] = "Tarea actualizada"; 
   $_SESSION['message-type'] = "primary";
 
	header("Location:  index.php");
}


 ?>

 <?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card">
				<div class="card-body">
					<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<div class="form-group">
							<input type="text" name="title" value=" <?php echo $title; ?> " class="form-control" placeholder="Guardar">
						</div>
						<div class="form-group">
							<textarea name="description" rows="2"  class="form-control"
							placeholder="Description">
								<?php echo $description; ?>

							</textarea>
						</div>

						<button class="btn btn-success btn-block" name="update">
							Actualizar
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>		

 <?php include("includes/footer.php") ?>
