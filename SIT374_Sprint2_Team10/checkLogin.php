<?php

    	//creates session
    session_start();

	// gets username and password.
    $username = $_GET['username'];
    $submit = $_GET['submit'];

	// encrypts password using salt and sha256
    $salt = "A7fds7f6sd6d6fd77fd";
    $submit = $submit.$salt;
    $submit = hash("sha256",$submit);

	// connects to database (replace $dbuser and $dbpass with your own database username and password)
    $dbuser = "jlicha";
    $dbpass = "1Nt3rc3ptor";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

	// checks if user with a certain username and password exist
    $sql = "SELECT * FROM users WHERE username = '$username' AND submit = '$submit'";

    $stmt = oci_parse($connect, $sql);

    if(!$stmt)  {
	echo "An error occurred in parsing the sql string.\n";
	exit;
    }

	oci_execute($stmt);

	// username and password match, the username is stored and the user is logged in
    if (oci_fetch_array($stmt)) {
    	$_SESSION['userError'] = "";
    	$_SESSION['loggedin'] = $username;
    	header('location: monitoringPage.php');
    }
    else {
	// if login is unsuccessful, the user is sent back to the login page
    	$_SESSION['loggedin'] = "";
    	header('location: login.php?login=false');
    }

  oci_close($connect);

?>
