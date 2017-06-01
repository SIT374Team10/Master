<?php

    session_start();

    $username = $_GET['username'];
    $submit = $_GET['submit'];

    $dbuser = "jlicha";
    $dbpass = "1Nt3rc3ptor";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    $sql = "SELECT * FROM users WHERE username = '$username' AND submit = '$submit'";

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
    $_SESSION['loggedin'] = "";
    header('location: login.php?login=false');
  }

  oci_close($connect);

?>
