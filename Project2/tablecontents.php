<?php

    function showTable() {
        $dbuser = "dgbr"; /* your deakin login */
        $dbpass = "ilovecows"; /* your oracle access password */
        $dbname = "SSID";
        $db = oci_connect($dbuser, $dbpass, $dbname);

        if (!$db) {
            echo "An error occurred connecting to the database";
            exit;
        }

        $sql = "SELECT * FROM fake";

        $stmt = oci_parse($db, $sql);

        if(!$stmt) {
            echo "An error occurred in parsing the sql string.\n";
            exit;
        }
        oci_execute($stmt);

        $output[] = '<form>';
        $output[] = '<table class="cart_table">';
        $output[] = '<tr class="cart_title"><td></td><td>ID</td><td>RETAILER</td></tr>';

        while(oci_fetch_array($stmt)) {
            $id = oci_result($stmt,"ID");
            $retailer= oci_result($stmt,"RETAILER");
            $output[] = '<tr>';
            $output[] = '<td> </td>';
            $output[] = '<td>'.$id.'</td>';
            $output[] = '<td>'.$retailer.'</td>';
            $output[] = '</tr>';
        }

        $output[] = '</table>';
        $output[] = '</form>';

        return join ('', $output);

        oci_close($db);
      }

?>
