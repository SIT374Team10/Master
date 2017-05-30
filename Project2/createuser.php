<?php

    session_start();

    $_SESSION['loggedin'] = "";

    $username = $_SESSION['createUsername'];
    $submit = $_SESSION['createSubmit'];
    $email = $_SESSION['createEmail'];

    $dbuser = "dgbr";
    $dbpass = "ilovecows";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    $sql = "INSERT INTO users (username, submit, email) VALUES ('{$username}', '{$submit}', '{$email}')";

    $stmt = oci_parse($connect, $sql);

	  if(!$stmt)  {
		  echo "An error occurred in parsing the sql string.\n";
		  exit;
    }

	oci_execute($stmt);

  header('location: login.php');
  exit;

  delete_everything();

  oci_close($connect);

?>
