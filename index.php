 <?php include("db.php")?>
 <?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
			<?php if (isset($_SESSION['message'])) { ?>

				 <div class="alert alert-<?=  $_SESSION['message-type']; ?> alert-dismissible fade show" role="alert">
					  <?= $_SESSION['message'] ?>

 
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <a href="#" class="alert-link"></a>
</div>


	<?php session_unset(); } ?>	


			<div class="card">
				<div class="card-body">
					<form action="save-task.php" method="POST">
						<div class="form-froup">
							<input type="text" name="title" class="form-control" placeholder="Task a title" autofocus>
						</div>
						<div class="form-group">
							<textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
						</div>
						<input type="submit" value="Save" class="btn btn-success btn-block" name="save">
					</form>
					
				</div>
			</div>
			
		</div>
		<div class="col-md-8">

			<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Create at</th>
      <th scope="col">Actions</th>
     </tr>
   </thead>
  <tbody>
    
    <?php 

    	$query = "SELECT * FROM  task";
    	$resultado_tasks = mysqli_query($conexion, $query);
    	while ($row = mysqli_fetch_array($resultado_tasks)) {?> <!--mientras recorro mi tarea -->
		<tr>
			<td> <?php echo $row['title'] ?></td>
			<td> <?php echo $row['description'] ?></td>
			<td> <?php echo $row['date'] ?></td>
			<td>
				<a href="edit.php?id=<?php echo $row['id'] ?>" >
					<i class="fas fa-edit edit"></i>
				</a>
				<a href="delete_task.php?id=<?php echo $row['id'] ?>" >
					<i class="fas fa-trash-alt delete"></i>
				</a>
			</td>
		</tr>

    	<?php } ?>
  </tbody>
</table> 
		</div>
	</div>
	</div>
</div>	
  

 	<?php include("includes/footer.php") ?>
 </body>
 </html>



 <style type="text/css">
 	.delete{
 		color: red;
 		font-size: 1.5em;
 	}
 	.edit{
 		font-size: 1.5em;
 	}
 </style>