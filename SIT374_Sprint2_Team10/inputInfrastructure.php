<?php

	// starts session
  session_start();

	// gets username, infrastructure cost, and infrastructure components
    $user = $_SESSION['loggedin'];
    $cost = $_GET['hidden'];
    $service = $_GET['service'];
    $ram = $_GET['ram'];
    $ssd = $_GET['ssd'];

    $p1 = $_GET['p1'];
    $p2 = $_GET['p2'];
    $p3 = $_GET['p3'];
    $p4 = $_GET['p4'];
    $p5 = $_GET['p5'];
    $p6 = $_GET['p6'];
    $p7 = $_GET['p7'];
    $p8 = $_GET['p8'];
    $p9 = $_GET['p9'];
    $p10 = $_GET['p10'];
    $p11 = $_GET['p11'];
    $p12 = $_GET['p12'];
    $p13 = $_GET['p13'];
    $p14 = $_GET['p14'];
    $p15 = $_GET['p15'];
    $p16 = $_GET['p16'];
    $p17 = $_GET['p17'];
    $p18 = $_GET['p18'];
    $p19 = $_GET['p19'];
    $p20 = $_GET['p20'];
    $p21 = $_GET['p21'];

    $servers = $_GET['servers'];
    $vm = $_GET['vm'];
    $cpu = $_GET['cpu'];

	// connects to database
    $dbuser = "jlicha";
    $dbpass = "1Nt3rc3ptor";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

	// inputs selected infrastructure into database table
    $sql = "INSERT INTO infrastructure
    (ID, COST, USERNAME, SERVICE, RAM, SSD, PACKAGEONE,
      PACKAGETWO, PACKAGETHREE, PACKAGEFOUR,
      PACKAGEFIVE, PACKAGESIX, PACKAGESEVEN, PACKAGEEIGHT,
      PACKAGENINE, PACKAGETEN, PACKAGEELEVEN, PACKAGETWELVE,
      PACKAGETHIRTEEN, PACKAGEFOURTEEN, PACKAGEFIFTEEN,
      PACKAGESIXTEEN, PACKAGESEVENTEEN,
      PACKAGEEIGHTTEEN, PACKAGENINETEEN,
      PACKAGETWENTY, PACKAGETWENTYONE, SERVERS,
      VM, CPU) VALUES
      (SEQUENCE_ID.nextval, '{$cost}', '{$user}', '{$service}',
      '{$ram}', '{$ssd}', '{$p1}', '{$p2}', '{$p3}', '{$p4}',
      '{$p5}', '{$p6}', '{$p7}', '{$p8}', '{$p9}', '{$p10}',
      '{$p11}', '{$p12}', '{$p13}', '{$p14}', '{$p15}',
      '{$p16}', '{$p17}', '{$p18}', '{$p19}', '{$p20}', '{$p21}',
      '{$servers}', '{$vm}', '{$cpu}')";

    $stmt = oci_parse($connect, $sql);

	if(!$stmt)  {
		echo "An error occurred in parsing the sql string.\n";
		exit;
    	}

	oci_execute($stmt);

	// redirects user to monitoringPage.php
    	header('location: monitoringPage.php?');

    	oci_close($connect);

?>
