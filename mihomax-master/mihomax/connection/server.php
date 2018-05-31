<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$nom = "";
$prenom = "";
$datnais = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'db_films');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $nom = mysqli_real_escape_string($db, $_POST['nom']);
  $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
  $datnais = mysqli_real_escape_string($db, $_POST['datnais']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($nom)) { array_push($errors, "Nom is required"); }
  if (empty($prenom)) { array_push($errors, "Prenom is required"); }
  if (empty($datnais)) { array_push($errors, "Date de naisance is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
  	
  	$password = md5($password_1);//encrypt the password before saving in the database

  	/* Switch off auto commit to allow transactions*/
  	mysqli_autocommit($db, FALSE);
  	$query_success = TRUE;
  	
  	$sql = 'INSERT INTO membres (prenom, nom, datnais, datinsc) VALUES (?, ?, ?, NOW())';
  	$stmt = mysqli_prepare($db, $sql);
  	mysqli_stmt_bind_param($stmt, 'sss', $prenom, $nom, $datnais);
  	if (!mysqli_stmt_execute($stmt)) {
  		$query_success = FALSE;
  	}
  	mysqli_stmt_close($stmt);
  	$membreId=mysqli_insert_id($db);
  	
 
 	$sql = 'INSERT INTO users (username, email, password, idm) VALUES (?, ?, ?, ?)';
 	$stmt = mysqli_prepare($db, $sql);
 	mysqli_stmt_bind_param($stmt, 'sssi', $username, $email, $password, $membreId);
 	if (!mysqli_stmt_execute($stmt)) {
 		$query_success = FALSE;
 	}
 	mysqli_stmt_close($stmt);
 	$userId=mysqli_insert_id($db);
	
 	/* Commit or rollback transaction */
 	if ($query_success) {
 		mysqli_commit($db);
 	} else {
 		mysqli_rollback($db);
 	}
 	mysqli_close($db);
 	$_SESSION['username'] = $username;
 	$_SESSION['userId'] = $userId;
 	$_SESSION['success'] = "vous êtes inscrit et connecté";
 	header('location: ../index.php');

  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Pseudo est requis");
  }
  if (empty($password)) {
  	array_push($errors, "mot de passe est requis");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		$_SESSION['userId'] = mysqli_fetch_row($results)[0];
  	  	$_SESSION['username'] = $username;
  	 	 $_SESSION['success'] = "vous êtes connecté";
  	 	 if ($username==="admin@admin.ca"){
  	 	 	header('location: ../php/main.php');
  	 	 }else {
  	  		header('location: ../index.php');
  	 	 }
  	}else {
  		array_push($errors, "mauvaise Pseudo/Mot de passe");
  	}
  }
}

?>