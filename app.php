<?php 

 include('config/db_connect.php');

	$name = $gender = $date_of_birth = $age = $state_of_origin = $email = $phone_number = $qualification = $certification = $grade = $address = $previous_employers = $previous_jobs = '';
	$errors = array('name' => '', 'gender' => '', 'date_of_birth' => '', 'age' =>'',     'state_of_origin' =>'' , 'email' =>'' , 'phone_number' =>'' , 'qualification' =>'' ,              'certification' =>'' , 'grade' =>'' , 'address' =>'' , 'previous_employers' =>'' ,'previous_jobs' => '');


	if(isset($_POST['submit'])){ 

        // check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} else{
			$name = $_POST['name'];
  			if(!preg_match('/^[0-9a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'name must be letters and spaces only';
			}
		}

		 // check gender
		if(empty($_POST['gender'])){
			$errors['gender'] = 'A gender is required';
		} else{
			$gender = $_POST['gender'];
  			if(!preg_match('/^[a-zA-Z\s]+$/', $gender)){
				$errors['gender'] = 'gender must be letters and spaces only';
			}
		}

		// check date of birth
		if(empty($_POST['date_of_birth'])){
			$errors['date_of_birth'] = 'A date of birth is required';
		} else{
			$date_of_birth = $_POST['date_of_birth'];
  			if(!preg_match('/^[a-zA-Z0-9,.!?\s]*$/', $date_of_birth)){
				$errors['date_of_birth'] = 'date of birth must be alphanumeric only';
			}
		}

		// check age
		if(empty($_POST['age'])){
			$errors['age'] = 'An age is required';
		} else{
			$age = $_POST['age'];
  			if(!preg_match('/^[0-9a-zA-Z\s]+$/', $age)){
				$errors['age'] = 'age must be letters and spaces only';
			}
		}

		// check state of origin
		if(empty($_POST['state_of_origin'])){
			$errors['state_of_origin'] = 'A state of origin is required';
		} else{
			$state_of_origin = $_POST['state_of_origin'];
  			if(!preg_match('/^[a-zA-Z\s]+$/', $state_of_origin)){
				$errors['state_of_origin'] = 'state must be letters and spaces only';
			}
		}

		
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}


        // check phone number
		if(empty($_POST['phone_number'])){
			$errors['phone_number'] = 'An phone number is required';
		} else{
			$phone_number = $_POST['phone_number'];
			if(!preg_match('/^\d{11}$/', $phone_number)){
				$errors['phone_number'] = 'Phone number must be numeric and 11 digits only';
			}
		}

		 // check qualification
		if(empty($_POST['qualification'])){
			$errors['qualification'] = 'your qualification is required';
		} else{
			$qualification = $_POST['qualification'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $qualification)){
				$errors['qualification'] = 'qualification  must be alphabets only';
			}
		}

		 // check certification
		if(empty($_POST['certification'])){
			$errors['certification'] = 'certification is required';
		} else{
			$certification = $_POST['certification'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $qualification)){
				$errors['certification'] = 'certification  must be alphabets only';
			}
		}

         
        // check grade
		if(empty($_POST['grade'])){
			$errors['grade'] = 'grade is required';
		} else{
			$grade = $_POST['grade'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $grade)){
				$errors['grade'] = 'grade must be alphabets only';
			}
		}

        
        // check house address
		if(empty($_POST['address'])){
			$errors['address'] = 'house address is required';
		} else{
			$address = $_POST['address'];
			if(!preg_match('/^[0-9a-zA-Z\s]+$/', $address)){
				$errors['address'] = 'address must be letters and spaces only';
			}
		}


          // check previous employers
		if(empty($_POST['previous_employers'])){
			$errors['previous_employers'] = 'A previous work place is required';
		} else{
			$previous_employers = $_POST['previous_employers'];
			if(!preg_match('/^[0-9a-zA-Z\s]+$/', $previous_employers)){
				$errors['previous_employers'] = 'previous work place must be letters and spaces only';
			}
		}


		  // check roles at previous work place
		if(empty($_POST['previous_jobs'])){
			$errors['previous_jobs'] = 'A previous work place is required';
		} else{
			$previous_jobs = $_POST['previous_jobs'];
			if(!preg_match('/^[0-9a-zA-Z\s]+$/', $previous_jobs)){
				$errors['previous_jobs'] = 'previous work place must be letters and spaces only';
			}
		}




		
		if(array_filter($errors)){
			echo 'errors in the form';
		}else{
            
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$gender = mysqli_real_escape_string($conn, $_POST['gender']);
			$date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
			$age = mysqli_real_escape_string($conn, $_POST['age']);
			$state_of_origin = mysqli_real_escape_string($conn, $_POST['state_of_origin']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
			$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
			$certification = mysqli_real_escape_string($conn, $_POST['certification']);
			$grade = mysqli_real_escape_string($conn, $_POST['grade']);
			$address = mysqli_real_escape_string($conn, $_POST['address']);
			$previous_employers = mysqli_real_escape_string($conn, $_POST['previous_employers']);
			$previous_jobs = mysqli_real_escape_string($conn, $_POST['previous_jobs']);

            //create sql
            $sql = "INSERT INTO application(name, gender, date_of_birth, age, state_of_origin, email, phone_number, qualification, certification, grade, address, previous_employers, previous_jobs) VALUES('$name','$gender','$date_of_birth','$age','$state_of_origin','$email','$phone_number','$qualification','$certification','$grade','$address','$previous_employers','$previous_jobs')";

            //save to db and check;
            if(mysqli_query($conn, $sql)){
            	echo "application submitted successfully";
            	//header('Location: index.php');

            }else {

            	//error
            	echo 'query error:' . mysqli_error($conn);
            }

            
		
		}

	} // end POST check

?>
      
	
<?php include('header.php'); ?>



<body>
	<!--<h3>medium and large screen</h3>-->
	<div class="container z-depth-2 hide-on-small-only">  
		<div class="row">
			<div class="m6 l6 col push-l3">
				<h3>CUSTOMER SUPPORT OFFICER NEEDED IN A FINANCIAL INSTITUTION MARINA. Pay is 75,000 Basic Pay + Commission + Leave Allowance + 13th Month + HMO</h3>
			</div>
		</div>
	</div>


  <form class="white" action="app.php" method="POST">
	<div class="hide-on-small-only">
		<div class="row">
			<div class="col l7 m6 push-m3 push-l3">
				<h6><em>Full Name</em></h6>
				<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			</div>
		</div>	
		<div class="input-field" value="<?php echo htmlspecialchars($gender) ?>">
			<div class="red-text" style="margin-left: 600px;"><?php echo $errors['gender']; ?></div>
			<div class="row">
				<div class="col l6 m6 push-m3 push-l3">
					<h6><em>Gender</em></h6>
					<select name="gender">
						<option value="" disabled selected>select</option>
						<option>Male</option>
						<option>Female</option>

					</select>
				</div>
			</div>

		</div>

	</div>


	<div class="hide-on-small-only section">
		<div class="row">
			<div class="col l6  m6 push-m3 push-l3 push-m4">

				<div class="col push-l1">
					<h6><em>Date of birth</em></h6>
				</div>
				<div class="input-field">
					<input type="text" name="date_of_birth" class="datepicker"  value="<?php echo htmlspecialchars($date_of_birth) ?>">
			<div class="red-text"><?php echo $errors['date_of_birth']; ?></div>
				</div>
			</div>
		</div>
	</div>

	<div class="hide-on-small-only">
		<div class="row">
			<div class="col l4 m6 push-m3 push-l4 age">
				<h6><em>Age</em></h6>
				<input type="text" name="age"  value="<?php echo htmlspecialchars($age) ?>">
			<div class="red-text"><?php echo $errors['age']; ?></div>
			</div>
		</div>	
	</div>

	<div class="hide-on-small-only">
		<div class="row">
			<div class="col l4 m6 push-m3 push-l4">
				<h6><em>State of origin</em></h6>
				<input type="text" name="state_of_origin"  value="<?php echo htmlspecialchars($state_of_origin) ?>">
			<div class="red-text"><?php echo $errors['state_of_origin']; ?></div>
			</div>
		</div>	
	</div>

	<div class="hide-on-small-only">
		<div class="row">
			<div class="col l4 m6 push-m3 push-l4">
				<h6><em>Email</em></h6>
				<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			</div>
		</div>	
	</div>


	<div class="hide-on-small-only">
		<div class="row">
			<div class="col l4 m6 push-m3 push-l4">
				<h6><em>Phone Number</em></h6>
				<input type="text" name="phone_number" value="<?php echo htmlspecialchars($phone_number) ?>">
			<div class="red-text"><?php echo $errors['phone_number']; ?></div>
			</div>
		</div>	
	</div>



	<div class="hide-on-small-only">
		<div class="input-field" value="<?php echo htmlspecialchars($qualification) ?>">
			<div class="red-text center"><?php echo $errors['qualification']; ?></div>
			<div class="row">
				<div class="col l6 m6 push-m3 push-l3">
					<h6><em>Qualification</em></h6>
					<select name="qualification">
						<option value="" disabled selected>select</option>
						<option>OND</option>
						<option>HND</option>
						<option>BSC</option>
						<option>NCE</option>
						<option>MSC</option>
					</select>
				</div>
			</div>

		</div>

	</div>




	<div class="hide-on-small-only">
		<div class="input-field" value="<?php echo htmlspecialchars($certification) ?>">
			<div class="red-text center" style="margin-top: 100px;"><?php echo $errors['certification']; ?></div>
			<div class="row">
				<div class="col l7 m6 push-m3 push-l3">
					<h6><em>Nysc Certification</em></h6>
					<select name="certification">
						<option disabled selected>select</option>
						<option>Yes</option>
						<option>No</option>
						<option>Processing</option>
					</select>
				</div>
			</div>
		</div>

	</div>


  <div class="hide-on-small-only">
		<div class="input-field" value="<?php echo htmlspecialchars($grade) ?>">
			<div class="red-text center" style="margin-top: 100px";><?php echo $errors['grade']; ?></div>
			<div class="row">
				<div class="col l6 m6 push-m3 push-l3">
					<h6><em>Grade</em></h6>
					<select  name="grade">
						<option value="" disabled selected>select</option>
						<option>First Class</option>
						<option>Second Class Upper</option>
						<option>Second Class Lower</option>
						<option>Third Class</option>
						<option>Upper Credit</option>
						<option>Lower Credit</option>
						<option>Distinction</option>
						<option>Pass</option>
					</select>
				</div>
			</div>

		</div>

	</div>



	<div class="hide-on-small-only">
		<div class="row">
			<div class="col l6 m6 push-m3 push-l3">
				<h6><em>Full House	Address</em></h6>
				<input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>">
			<div class="red-text"><?php echo $errors['address']; ?></div>
			</div>
		</div>	
	</div>

	<div class="hide-on-small-only">
		<div class="row">
			<div class="col l6 m6 push-m3 push-l3">
				<h6><em>Previous Employers (Kindly state all the companies you have worked with) </em></h6>
				<input type="text" name="previous_employers" value="<?php echo htmlspecialchars($previous_employers) ?>">
			<div class="red-text"><?php echo $errors['previous_employers']; ?></div>
			</div>
		</div>	
	</div>

      
      <div class="hide-on-small-only">
		<div class="row">
			<div class="col l6 m6 push-m3 push-l3">
				<h6><em>Previous Job roles (Kindly state the roles you have worked in) </em></h6>
				<input type="text" name="previous_jobs" value="<?php echo htmlspecialchars($previous_jobs) ?>">
			<div class="red-text"><?php echo $errors['previous_jobs']; ?></div>
			</div>
		</div>	
	</div>
 
 <div class="center section hide-on-small-only">
				<input type="submit" name="submit" value="Submit" class="btn brand green z-depth-0">
			</div>
 </form>			


	

	<!--<h3>small screen only</h3>-->

	<form class="white" action="app.php" method="POST">

	<div class="containers z-depth-2 hide-on-med-and-up">
		<div class="row">
			<div class="m6 l6 col push-l3">
				<h3>CUSTOMER SUPPORT OFFICER NEEDED IN A FINANCIAL INSTITUTION MARINA. Pay is 75,000 Basic Pay + Commission + Leave Allowance + 13th Month + HMO</h3>
			</div>
		</div>
	</div>
	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s8 push-s2">
				<h6><em>Full Name</em></h6>
				<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			</div>
		</div>
	</div>


	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="input-field" name="gender" value="<?php echo htmlspecialchars($gender) ?>">
			<div class="red-text"><?php echo $errors['gender']; ?></div>
			<div class="row">
				<div class="col s12">
					<h6><em>Gender</em></h6>
					<select name="gender">
						<option value="" disabled selected>select</option>
						<option>Male</option>
						<option>Female</option>

					</select>
				</div>
			</div>

		</div>
	</div>


	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s12">
				<div class="col s12 push-s2">
					<h6><em>Date of birth</em></h6>
				</div>
				<div class="input-field" name="date_of_birth" value="<?php echo htmlspecialchars($date_of_birth) ?>">
			<div class="red-text"><?php echo $errors['date_of_birth']; ?></div>
					<input type="text" name="date_of_birth" class="datepicker">
				</div>
			</div>
		</div>
	</div>


	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s6 push-s3">
				<h6><em>Age</em></h6>
				<input type="text" name="age" value="<?php echo htmlspecialchars($age) ?>">
			<div class="red-text"><?php echo $errors['age']; ?></div>
			</div>
		</div>	
	</div>


	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s6 push-s3">
				<h6><em>State of origin</em></h6>
				<input type="text" name="state_of_origin" value="<?php echo htmlspecialchars($state_of_origin) ?>">
			<div class="red-text"><?php echo $errors['state_of_origin']; ?></div>
			</div>
		</div>	
	</div>

	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s6 push-s3">
				<h6><em>Email</em></h6>
				<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			</div>
		</div>	
	</div>

	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s6 push-s3">
				<h6><em>Phone Number</em></h6>
				<input type="text" name="phone_number" value="<?php echo htmlspecialchars($phone_number) ?>">
			<div class="red-text"><?php echo $errors['phone_number']; ?></div>
			</div>
		</div>	
	</div>


	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="input-field" value="<?php echo htmlspecialchars($qualification) ?>">
			<div class="red-text"><?php echo $errors['qualification']; ?></div>
			<div class="row">
				<div class="col s8 push-s1">
					<h6><em>Qualification</em></h6>
					<select name="qualification">
						<option value="" disabled selected>select</option>
						<option>OND</option>
						<option>HND</option>
						<option>BSC</option>
						<option>NCE</option>
						<option value="text">MSC</option>
					</select>
				</div>
			</div>

		</div>

	</div>


	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="input-field" value="<?php echo htmlspecialchars($certification) ?>">
			<div class="red-text"><?php echo $errors['certification']; ?></div>
			<div class="row">
				<div class="col s7 push-s1">
					<h6><em>Nysc Certification</em></h6>
					<select name="certification">
						<option  disabled selected>select</option>
						<option>Yes</option>
						<option>No</option>
						<option>Processing</option>
					</select>
				</div>
			</div>
		</div>

	</div>

	 <div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="input-field" value="<?php echo htmlspecialchars($grade) ?>">
			<div class="red-text"><?php echo $errors['grade']; ?></div>
			<div class="row">
				<div class="col s6 push-s1">
					<h6><em>Grade</em></h6>
					<select name="grade">
						<option value="" disabled selected>select</option>
						<option>First Class</option>
						<option>Second Class Upper</option>
						<option>Second Class Lower</option>
						<option>Third Class</option>
						<option>Upper Credit</option>
						<option>Lower Credit</option>
						<option>Distinction</option>
						<option>Pass</option>
					</select>
				</div>
			</div>

		</div>

	</div>


       <div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s6 push-s3">
				<h6><em>Full House	Address</em></h6>
				<input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>">
			<div class="red-text"><?php echo $errors['address']; ?></div>
			</div>
		</div>	
	</div>

	<div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s12">
				<h6><em>Previous Employers (Kindly state all the companies you have worked with) </em></h6>
				<input type="text" name="previous_employers" value="<?php echo htmlspecialchars($previous_employers) ?>">
			<div class="red-text"><?php echo $errors['previous_employers']; ?></div>
			</div>
		</div>	
	</div>

      
      <div class="containers1 z-depth-1 hide-on-med-and-up">
		<div class="row">
			<div class="col s12">
				<h6><em>Previous Job roles (Kindly state the roles you have worked in) </em></h6>
				<input type="text" name="previous_jobs" value="<?php echo htmlspecialchars($previous_jobs) ?>">
			<div class="red-text"><?php echo $errors['previous_jobs']; ?></div>
			</div>
		</div>	
	</div>

	
 <div class="center section hide-on-med-and-up">
				<input type="submit" name="submit" value="Submit" class="btn brand green z-depth-0">
			</div>
 </form>			


 <!-- <div class="input-field">
  	<select>
  		<option>option 1</option>
  		<option>option 2</option>
  		<option>option 3</option>
  		<option>option 4</option>
  		<option>option 5</option>

  	</select>
  	
  </div> -->
  <?php include('footer.php'); ?>

  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
  	$(document).ready(function(){

  		$('.sidenav').sidenav();
  		$('.materialboxed').materialbox();
  		$('.parallax').parallax();
  		$('.tabs').tabs();
  		$('.datepicker').datepicker({
  			disableWeekends: true
  		})
  		$('.tooltipped').tooltip();
  		$('.scrollspy').scrollSpy();
  		$('select').formSelect();
  		$('.datepicker').datepicker();
  	});
  </script>
</body>
</html>