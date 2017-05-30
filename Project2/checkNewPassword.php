<?php

    session_start();

    $result = true;

    $submit = $_GET['old'];
    $new = $_GET['newOne'];
    $username = $_GET['username'];

    $dbuser = "dgbr";
    $dbpass = "ilovecows";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    $sql = "SELECT submit FROM users WHERE lower(username) LIKE lower('%$username%') AND lower(submit) LIKE lower('%$submit%')";

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
      //header('location: monitoringPage.php');
    }

    if ($result == true){ // user does exist and password is correct
      /*
      $sql = "SELECT submit FROM users WHERE lower(username) LIKE lower('%$username%') AND lower(submit) LIKE lower('%$submit%')";

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
        //header('location: monitoringPage.php');
      }*/


    }
    else {
      // create alert
    }

    oci_close($connect);

?>
