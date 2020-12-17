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

	<div class="container center">
		<?php if($a): ?>
			<div class="row">
				<div class="col push-s4 push-m4 push-l5">
			<h5><?php echo $a['location']; ?></h5>
		</div>
	</div>
			<p>Created by <?php echo $a['email']; ?></p>
			<p><?php echo date($a['created_at']); ?></p>
			<h5>Destination:</h5>
			<p><?php echo $a['destination']; ?></p>

			<!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $trans['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>No such information exists.</h5>
		<?php endif ?>
	</div>

	<?php include('footer.php'); ?>

</html>