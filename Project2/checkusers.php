<?php

    session_start();

    $_SESSION['loggedin'] = "";
    $username = $_GET['username'];
    $submit = $_GET['submit'];
    $email = $_GET['email'];

    $dbuser = "jlicha";
    $dbpass = "1Nt3rc3ptor";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

    $stmt = oci_parse($connect, $sql);

	  if(!$stmt)  {
		  echo "An error occurred in parsing the sql string.\n";
		  exit;
    }

	oci_execute($stmt);

  if (oci_fetch_array($stmt)) { // user already exists
    header('location: signup.php?createAccount=false');
    exit;
	}
  else { //user does not exist
    $_SESSION['createUserError'] = "";
    $_SESSION['loggedin'] = $username;

    $_SESSION['createUsername'] = $username;
    $_SESSION['createSubmit'] = $submit;
    $_SESSION['createEmail'] = $email;

    header('location: createuser.php');
    exit;
  }

  delete_everything();
  oci_close($connect);

?>
