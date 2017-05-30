<?php

    session_start();

    $username = $_GET['username'];
    $submit =   $_SESSION['hased'];

    $dbuser = "dgbr";
    $dbpass = "ilovecows";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    $sql = "SELECT * FROM users WHERE lower(username) LIKE lower('%$username%') AND lower(submit) LIKE lower('%$submit%')";

    $stmt = oci_parse($connect, $sql);

	  if(!$stmt)  {
		  echo "An error occurred in parsing the sql string.\n";
		  exit;
    }

	oci_execute($stmt);

	if (oci_fetch_array($stmt)) {
    $_SESSION['userError'] = "";
    $_SESSION['loggedin'] = $username;
    header('location: monitoringPage.php');
	}
  else {
    header('location: login.php?login=false');
  }

  oci_close($connect);

?>
