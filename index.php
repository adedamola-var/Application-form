<?php 

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT name, gender, date_of_birth, age, state_of_origin, email, phone_number, qualification, certification, grade, address, previous_employers, previous_jobs, id FROM application ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$app = mysqli_fetch_all($result, MYSQLI_ASSOC); 

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>


<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM application WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM application WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$trans = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>


<!DOCTYPE html>
<html>
	
    <div class="row">
    	<div class="col push-s2 push-l5">
	<h4 class="center grey-text">Submitted Applications</h4>
</div>
</div>

	<div class="container">
		<div class="row">

			<?php foreach($app as $a): ?>

				<div class="col s12 m6 l6">
					<div class="card z-depth-2">
						<div class="card-content center">
							<h6>User ID: <?php echo htmlspecialchars($a['id']); ?></h6>
							<h6>Fullname: <?php echo htmlspecialchars($a['name']); ?></h6>
							<h6>Gender: <?php echo htmlspecialchars($a['gender']); ?></h6>
							<h6>Date of birth: <?php echo htmlspecialchars($a['date_of_birth']); ?></h6>
							<h6>Age: <?php echo htmlspecialchars($a['age']); ?></h6>
							<h6>State of origin: <?php echo htmlspecialchars($a['state_of_origin']); ?></h6>
							<h6>Email: <?php echo htmlspecialchars($a['email']); ?></h6>
							<h6>Phone number: <?php echo htmlspecialchars($a['phone_number']); ?></h6>
							<h6>Qualification: <?php echo htmlspecialchars($a['qualification']); ?></h6>
							<h6>Nysc Certification: <?php echo htmlspecialchars($a['certification']); ?></h6>
							<h6>Grade <?php echo htmlspecialchars($a['grade']); ?></h6>
							<h6>House address: <?php echo htmlspecialchars($a['address']); ?></h6>
							<h6>Previous employers: <?php echo htmlspecialchars($a['previous_employers']); ?></h6>
							<h6>Previous job roles: <?php echo htmlspecialchars($a['previous_jobs']); ?></h6>
							
						</div>
				<!-- DELETE FORM -->
				<form action="index.php" method="POST">
				<div class="row">
				<div class="col push-s5 push-l5">
				<input type="hidden" name="id_to_delete" value="<?php echo $a['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0 red">
			</div>
		</div>
			</form>

					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('footer.php'); ?>

</html>