<html lang="en">
<head>
  <title>PHP CRUD</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<?php require_once'process.php'; ?>

	<?php 
	if(isset($_SESSION['message'])): 
	?>

	<div class="alert alert-<?= $_SESSION['msg_type'] ?>">

	<?php 
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>
 	</div>
 	<?php endif ?>


	<div class="container">
	<div class="row justify-content-center">
	<?php 
	$mysqli = new mysqli('localhost','root','Vrushali@28','crud') or die(mysqli_error($mysqli));
	$result = $mysqli->query("Select * from data") or die($mysqli->error); 
	?>

	<div>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th colspan="2">Action</th>		
				</tr>
				</thead>
	<?php 
		while($row = $result->fetch_assoc()):
	?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
				<a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">delete</a>
			</td>
		</tr>
		<?php endwhile; ?>
		</table>
	</div>



	<?php
	function pre_r( $array ) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';	
	}

	?>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		


		<div class="row justify-content-center">
		<form action="process.php" method="POST">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name" >
				</div>
				<div class="form-group">
					<label>Location</label>
					<input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your name">
				</div>
				<div class="form-group">
					<?php 
					if($update == true):
					?>
					<button type="Submit" class="btn btn-info" name="save">Update</button>
					<?php else: ?>
					<button type="Submit" class="btn btn-primary" name="save">Save</button>
					<?php endif; ?>
				</div>
		</form>
		</div>
	</div>

</body>
