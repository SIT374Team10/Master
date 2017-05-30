<?php

    $dbuser = "dgbr";
    $dbpass = "ilovecows";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    $searchRetailer = strip_tags($_GET['q']);
    $searchID = strip_tags($_GET['r']);

    $sql = "SELECT * FROM fake WHERE lower(retailer) LIKE lower('%$searchRetailer%') AND lower(id) LIKE lower('%$searchID%')";

    $stmt = oci_parse($connect, $sql);

	if(!$stmt)  {
		echo "An error occurred in parsing the sql string.\n";
		exit;
    }

	oci_execute($stmt);

    $output[] = '<table class="cart_table">';
    $output[] = '<tr class="cart_title">
                    <td>ID</td>
                    <td>RETAILER</td>
                    <td></td>
                </tr>';

	while(oci_fetch_array($stmt)) {
	    $id = oci_result($stmt,"ID");
      $retailer = oci_result($stmt,"RETAILER");
      $output[] = '<tr>';
      $output[] = '<td>'.$id.'</b></td>';
      $output[] = '<td>'.$retailer.'</td>';
      $output[] = '</tr>';
	}
	$output[] = '</table>';
	echo join('',$output);

	oci_close($connect);

?>
