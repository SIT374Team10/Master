<?php

    session_save_path("/tmp");

    $result = true;

    $submit = $_GET['old'];
    $new = $_GET['new'];
    $username = $_GET['user'];

    $dbuser = "jlicha";
    $dbpass = "1Nt3rc3ptor";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    $sql = "SELECT submit FROM users WHERE username ='$username' AND submit = '$submit'";

    $stmt = oci_parse($connect, $sql);

	  if(!$stmt)  {
		  echo "An error occurred in parsing the sql string.\n";
		  exit;
    }

	   oci_execute($stmt);

	  if (oci_fetch_array($stmt)) {
      $result = true;
	  }
    else {
      $result = false;
    }

    if ($result == true){ // user does exist and password is correct

      $sql = "UPDATE users SET submit = '$new' WHERE username = '$username'";

      $stmt = oci_parse($connect, $sql);

      if(!$stmt)  {
        echo "An error occurred in parsing the sql string.\n";
        exit;
      }

      oci_execute($stmt);

      $_SESSION['errorNewPassword'] = "";
      header('location: monitoringPage.php');

    }
    else {
      $_SESSION['errorNewPassword'] = "Username or password was incorrect";
      header('location: monitoringPage.php');
    }

    oci_close($connect);

?>
