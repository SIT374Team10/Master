<?php
  session_save_path("/tmp");
  $userError = $_SESSION['userError'];
  $userDisplay = $_SESSION['loggedin'];
  $errorNewPassword = $_SESSION['errorNewPassword'];

  // checks if user is logged in. If they’re not their directed to the log in page.
  /*if ($userDisplay == "") {
    header("Location: login.php");
    $_SESSION['illegalAccess'] = true;
  }*/

	// connects to db
    $dbuser = "jlicha";
    $dbpass = "1Nt3rc3ptor";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }


    $stmtTwo = oci_parse($connect, $sqlTwo);

    if(!$stmtTwo)  {
      echo "An error occurred in parsing the sql string.\n";
      exit;
    }

    oci_execute($stmtTwo);

    //
    $sqlTwo = "SELECT MAX(ID) FROM infrastructure";

    $stmtTwo = oci_parse($connect, $sqlTwo);

    if(!$stmtTwo)  {
      echo "An error occurred in parsing the sql string.\n";
      exit;
    }

    oci_execute($stmtTwo);

    while(oci_fetch_array($stmtTwo)) {
  	    $id = oci_result($stmtTwo,"MAX(ID)");
        $_SESSION['currentID'] = $id;
  	}

    oci_close($connect);

    $current = $_SESSION['currentID'];

    ////////////////////////////////////////////////////////////////////////////

    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

    if ($current != ""){

      $userDisplay = /*$_SESSION['loggedin']*/ "Superman";

    $sqlTwo = "SELECT * FROM infrastructure WHERE ID = '{$current}' AND USERNAME = '{$userDisplay}'";

    $stmtTwo = oci_parse($connect, $sqlTwo);

    if(!$stmtTwo)  {
      echo "An error occurred in parsing the sql string.\n";
      exit;
    }

    oci_execute($stmtTwo);

    while(oci_fetch_array($stmtTwo)) {
  	    $id = oci_result($stmtTwo,"ID");
        $cost = oci_result($stmtTwo,"COST");
        $service = oci_result($stmtTwo,"SERVICE");
        $ram = oci_result($stmtTwo,"RAM");
        $ssd = oci_result($stmtTwo,"SSD");
        $p1 = oci_result($stmtTwo,"PACKAGEONE");
        $p2 = oci_result($stmtTwo,"PACKAGETWO");;
        $p3 = oci_result($stmtTwo,"PACKAGETHREE");
        $p4 = oci_result($stmtTwo,"PACKAGEFOUR");
        $p5 = oci_result($stmtTwo,"PACKAGEFIVE");
        $p6 = oci_result($stmtTwo,"PACKAGESIX");
        $p7 = oci_result($stmtTwo,"PACKAGESEVEN");
        $p8 = oci_result($stmtTwo,"PACKAGEEIGHT");
        $p9 = oci_result($stmtTwo,"PACKAGENINE");
        $p10 = oci_result($stmtTwo,"PACKAGETEN");
        $p11 = oci_result($stmtTwo,"PACKAGEELEVEN");
        $p12 = oci_result($stmtTwo,"PACKAGETWELVE");
        $p13 = oci_result($stmtTwo,"PACKAGETHIRTEEN");
        $p14 = oci_result($stmtTwo,"PACKAGEFOURTEEN");
        $p15 = oci_result($stmtTwo,"PACKAGEFIFTEEN");
        $p16 = oci_result($stmtTwo,"PACKAGESIXTEEN");
        $p17 = oci_result($stmtTwo,"PACKAGESEVENTEEN");
        $p18 = oci_result($stmtTwo,"PACKAGEEIGHTTEEN");
        $p19 = oci_result($stmtTwo,"PACKAGENINETEEN");
        $p20 = oci_result($stmtTwo,"PACKAGETWENTY");
        $p21 = oci_result($stmtTwo,"PACKAGETWENTYONE");
        $servers = oci_result($stmtTwo,"SERVERS");
        $vm = oci_result($stmtTwo,"VM");
        $cpu = oci_result($stmtTwo,"CPU");

        $array = array($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $p16, $p17, $p18, $p19, $p20, $p21);
        $printArray = array();

        foreach($array as $i => $item){
          if ($item === NULL){
            unset($array[$i]);
          }
        }

        $output = join('<br>', $array);
  	}
  }
  else {
    $userError = "You cannot update a non-existing infrastructure";
  }


    function deleteInfrastructure(){

      $dbuser = "jlicha";
      $dbpass = "1Nt3rc3ptor";
      $db = "SSID";
      $connect = oci_connect($dbuser, $dbpass, $db);

      if (!$connect) {
          echo "An error occurred connecting to the database";
          exit;
      }

      $id = $_SESSION['currentID'];

      $sqlTwo = "DELETE FROM infrastructure WHERE ID = '{$id}'";

      $stmtTwo = oci_parse($connect, $sqlTwo);

      if(!$stmtTwo)  {
        echo "An error occurred in parsing the sql string.\n";
        exit;
      }

      oci_execute($stmtTwo);

    }

    oci_close($connect);

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css.css">
  <script type = "text/javascript" src="jquery-2.1.3.min.js"></script>
  <title>Monitoring Page</title>
  <style>
    whiteBox {background-color: white;	position: absolute;	width: 100%;	top: 350px;	height: 1040px;	left: 0px; z-index: 999999; margin: 0; padding: 0;}

    input[type=number]{
      width: 100%;
    }

    select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      background-position: right center;
      background-color: white;
      color: #000000;
      height:20px !important;
      width: 100%;
    }

    changePassword {
      position: fixed;
      background-color: white;
      left: 50%;
      margin-left:-200px;
      width: 400px;
      top: 50%;
      height: auto;
      margin-top: -200px;
      z-index: 999999999999;
       box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }

    exitButton {
      position: fixed;
      background-color: lightblue;
      z-index: 9999999999999;
      width: 10px;
      height: 10px;
      top:5px;
      right:5px;
    }

  </style>

  <script>

  function checkForm() {

      // Fetching values from all input fields and storing them in variables.
      var service = document.getElementById("service").value;
      var ram = document.getElementById("ram").value;
      var ssd = document.getElementById("ssd").value;
      var servers = document.getElementById("servers").value;
      var vm = document.getElementById("vm").value;
      var cpu = document.getElementById("cpu").value;
      var p1 = document.getElementById("p1").value;
      var p2 = document.getElementById("p2").value;
      var p3 = document.getElementById("p3").value;
      var p4 = document.getElementById("p4").value;
      var p5 = document.getElementById("p5").value;
      var p6 = document.getElementById("p6").value;
      var p7 = document.getElementById("p7").value;
      var p8 = document.getElementById("p8").value;
      var p9 = document.getElementById("p9").value;
      var p10 = document.getElementById("p10").value;
      var p11 = document.getElementById("p11").value;
      var p12 = document.getElementById("p12").value;
      var p13 = document.getElementById("p13").value;
      var p14 = document.getElementById("p14").value;
      var p15 = document.getElementById("p15").value;
      var p16 = document.getElementById("p16").value;
      var p17 = document.getElementById("p17").value;
      var p18 = document.getElementById("p18").value;
      var p19 = document.getElementById("p19").value;
      var p20 = document.getElementById("p20").value;
      var p21 = document.getElementById("p21").value;

        // calculate the cost of the infrastructure inputted
        var cost = 0;

        cost += Number(ram);
        cost += Number(ssd);
        cost += Number(servers);
        cost += Number(vm);
        cost += Number(cpu);

        //package costs
        if ($('input[name="p1"]').is(':checked'))
          cost += 1;
        if ($('input[name="p2"]').is(':checked'))
          cost += 1;
        if ($('input[name="p3"]').is(':checked'))
          cost += 1;
        if ($('input[name="p4"]').is(':checked'))
          cost += 1;
        if ($('input[name="p5"]').is(':checked'))
          cost += 1;
        if ($('input[name="p6"]').is(':checked'))
          cost += 1;
        if ($('input[name="p7"]').is(':checked'))
          cost += 1;
        if ($('input[name="p8"]').is(':checked'))
          cost += 1;
        if ($('input[name="p9"]').is(':checked'))
          cost += 1;
        if ($('input[name="p10"]').is(':checked'))
          cost += 1;
        if ($('input[name="p11"]').is(':checked'))
          cost += 1;
        if ($('input[name="p12"]').is(':checked'))
          cost += 1;
        if ($('input[name="p13"]').is(':checked'))
          cost += 1;
        if ($('input[name="p14"]').is(':checked'))
          cost += 1;
        if ($('input[name="p15"]').is(':checked'))
          cost += 1;
        if ($('input[name="p16"]').is(':checked'))
          cost += 1;
        if ($('input[name="p17"]').is(':checked'))
          cost += 1;
        if ($('input[name="p18"]').is(':checked'))
          cost += 1;
        if ($('input[name="p19"]').is(':checked'))
          cost += 1;
         ($('input[name="p20"]').is(':checked'))
          cost += 1;
        if ($('input[name="p21"]').is(':checked'))
          cost += 1;

          alert("Infrastructure has been updated");
          document.getElementById("hidden").value = cost;

          return true;

  }


    $(document).ready(function(){

      //$("#submitIt").hide();

      $("#bttnOne").click(function(){

        var value = document.getElementById("service").value;

        if (value == "Software Developer"){
          $('input[name=p2]').prop('checked', true); // python
          $('input[name=p4]').prop('checked', true); // git
          $('input[name=p5]').prop('checked', true); // php
          $('input[name=p14]').prop('checked', true); // ruby
          $('input[name=p15]').prop('checked', true); // .net
          $('input[name=p16]').prop('checked', true); // iOS

          $('input[name=p1]').prop('checked', false); // r
          $('input[name=p2]').prop('checked', false); // python
          $('input[name=p3]').prop('checked', false); // sql server
          $('input[name=p6]').prop('checked', false); // okta
          $('input[name=p7]').prop('checked', false); // Zscaler
          $('input[name=p8]').prop('checked', false); // ClipherCloud
          $('input[name=p9]').prop('checked', false); // iOK SDK
          $('input[name=p10]').prop('checked', false); // Android SDK
          $('input[name=p11]').prop('checked', false); // Xamarin
          $('input[name=p12]').prop('checked', false); // weka
          $('input[name=p13]').prop('checked', false); // apache drill
          $('input[name=p17]').prop('checked', false); // DocTrackr
          $('input[name=p18]').prop('checked', false); // Centrify
          $('input[name=p19]').prop('checked', false); // Vaultive
          $('input[name=p20]').prop('checked', false); // React Native
          $('input[name=p21]').prop('checked', false); // Unity*/
        }
        else if (value == "Data Science"){
          $('input[name=p1]').prop('checked', true); // r
          $('input[name=p2]').prop('checked', true); // python
          $('input[name=p3]').prop('checked', true); // sql server
          $('input[name=p12]').prop('checked', true); // weka
          $('input[name=p13]').prop('checked', true); // apache drill

          $('input[name=p4]').prop('checked', false); // git
          $('input[name=p5]').prop('checked', false); // php
          $('input[name=p6]').prop('checked', false); // okta
          $('input[name=p7]').prop('checked', false); // Zscaler
          $('input[name=p8]').prop('checked', false); // ClipherCloud
          $('input[name=p9]').prop('checked', false); // iOK SDK
          $('input[name=p10]').prop('checked', false); // Android SDK
          $('input[name=p11]').prop('checked', false); // Xamarin
          $('input[name=p14]').prop('checked', false); // ruby
          $('input[name=p15]').prop('checked', false); // .net
          $('input[name=p16]').prop('checked', false); // iOS
          $('input[name=p17]').prop('checked', false); // DocTrackr
          $('input[name=p18]').prop('checked', false); // Centrify
          $('input[name=p19]').prop('checked', false); // Vaultive
          $('input[name=p20]').prop('checked', false); // React Native
          $('input[name=p21]').prop('checked', false); // Unity
        }
        else if (value == "IT Security"){
          $('input[name=p1]').prop('checked', true); // r
          $('input[name=p6]').prop('checked', true); // okta
          $('input[name=p7]').prop('checked', true); // Zscaler
          $('input[name=p8]').prop('checked', true); // ClipherCloud
          $('input[name=p17]').prop('checked', true); // DocTrackr
          $('input[name=p18]').prop('checked', true); // Centrify
          $('input[name=p19]').prop('checked', true); // Vaultive

          $('input[name=p2]').prop('checked', false); // python
          $('input[name=p3]').prop('checked', false); // sql server
          $('input[name=p4]').prop('checked', false); // git
          $('input[name=p5]').prop('checked', false); // php
          $('input[name=p9]').prop('checked', false); // iOK SDK
          $('input[name=p10]').prop('checked', false); // Android SDK
          $('input[name=p11]').prop('checked', false); // Xamarin
          $('input[name=p12]').prop('checked', false); // weka
          $('input[name=p13]').prop('checked', false); // apache drill
          $('input[name=p14]').prop('checked', false); // ruby
          $('input[name=p15]').prop('checked', false); // .net
          $('input[name=p16]').prop('checked', false); // iOS
          $('input[name=p20]').prop('checked', false); // React Native
          $('input[name=p21]').prop('checked', false); // Unity
        }
        else if (value == "Mobile App Developer"){
          $('input[name=p4]').prop('checked', true); // git
          $('input[name=p9]').prop('checked', true); // iOK SDK
          $('input[name=p10]').prop('checked', true); // Android SDK
          $('input[name=p11]').prop('checked', true); // Xamarin
          $('input[name=p20]').prop('checked', true); // React Native
          $('input[name=p21]').prop('checked', true); // Unity

          $('input[name=p1]').prop('checked', false); // r
          $('input[name=p2]').prop('checked', false); // python
          $('input[name=p3]').prop('checked', false); // sql server
          $('input[name=p5]').prop('checked', false); // php
          $('input[name=p6]').prop('checked', false); // okta
          $('input[name=p7]').prop('checked', false); // Zscaler
          $('input[name=p8]').prop('checked', false); // ClipherCloud
          $('input[name=p12]').prop('checked', false); // weka
          $('input[name=p13]').prop('checked', false); // apache drill
          $('input[name=p14]').prop('checked', false); // ruby
          $('input[name=p15]').prop('checked', false); // .net
          $('input[name=p16]').prop('checked', false); // iOS
          $('input[name=p17]').prop('checked', false); // DocTrackr
          $('input[name=p18]').prop('checked', false); // Centrify
          $('input[name=p19]').prop('checked', false); // Vaultive
        }

      });
    });


</script>

  <script type="text/javascript">

    $(document).ready(function(){

      // Called when 'Change Password' button is pressed
      $("#bttnTwo").click(function(){
        $("body").append('<form method="get" action="checkNewPassword.php" action="checkNewPassword.php"><changePassword style="padding-top:50px;" id="change"><div style="margin-left:50px;font-size: 20px; padding-top:15px; width:100%;">Change Password</div><br><input type="text" id="user" name="user" value="<?php echo $userDisplay; ?>" hidden="true"><input style="margin-left:50px; width: 300px;" type="text" id="old" name="old" placeholder="Enter old password"><input style="margin-left:50px; width: 300px; margin-top:10px;" type="text" id="new" name = "new" placeholder="Enter your new password"><input style="margin-left:50px; width: 300px; margin-top:10px;" type="text" id="newTwo" name="newTwo" placeholder="Re-enter your new password"><input action="updateInfrastructure.php" style="margin-top:20px;" type="submit" class="submitBttnTwo" value="Submit" id="bttnThree"><input type="button" class="submitBttnThree" value="Exit" id="bttnFour"><br><br><br></changePassword></form>');

        $("#bttnThree").click(function(){
          var old = document.getElementById("old").value;
          var newOne = document.getElementById("new").value;
          var newTwo = document.getElementById("newTwo").value;
          var user = document.getElementById("user").value;

          if (old == "" || newOne == "" || newTwo == "") {
            alert("All forms must be filled in");
          }
          else if (newOne != newTwo) {
            alert("Your new password must match");
          }
        });

        $("#bttnFour").click(function(){
          $("#change").remove();
        });
      });

      $("#bttnFive").click(function(){

          alert("The current infrastructure is now deleted");
          $("body").load('deleteInfrastructure.php');


      });


    });

  </script>

</head>

<body>

  <input type="text" hidden="true" id="oldHidden" name="oldHidden">
  <input type="text"  hidden="true" id="newHidden" name="newHidden">

  <!-- Menu -->
    <div class="dropdown">
      <div class="dropbtn" style="font-family: 'Times New Roman', Times, serif; font-size:19px;">Menu</div>
      <div class="dropdown-content">
	<a style=“background-color: pink; border: 1px solid white;” type="button" id="bttnTwo">Change Password</a>
        <a href="login.php">Logout</a>
      </div>
    </div>

  <!-- Section One -->
  <heading>Infrastructure As A Management Tool</heading>
  <welcome>Welcome <?= $userDisplay ?></welcome>


  <!-- Section Three -->
  <whiteBox>

    <tableContainer>

      <tableContainerOne>

        <?php

        if($service != "")
        {
          echo '

        <div style="padding-left:10px; font-size: 20px; padding-top:15px;">Update IaaS Configuration</div>
        <divider style="margin-right:20px; margin-top: 10px; width: 380px;"></divider>

        <form method="get" name="config" id="config" style="padding-top: 15px;" action="updateInfrastructure.php">
          <table>
            <tr>
              <td>
                <br>Select Service Type:<br><br>
                <select name="service" id="service" class="inputFormAppearance">
                  <option value="No Service Selected">-</option>
                  <option value="Data Science">Data Science</option>
                  <option value="Software Developer">Software Developer</option>
                  <option value="IT Security">IT Security</option>
                  <option value="Mobile App Developer">Mobile App Developer</option>
                </select>
                <div id="service"></div><br>
                <input type="button" class="submitBttn" value="Submit" id="bttnOne">
              </td>
            </tr>
            <tr>
                <td>
                  <p style="padding-top:8px;">Adjust amount of Allocated RAM:<p>
                  <select name="ram" id="ram" class="inputFormAppearance">
                    <option value="45">8GB</option>
                    <option value="100" selected>16GB</option>
                  </select>
                  <div id="ram"></div>
                </td>
            </tr>
            <tr>
                <td>
                  <p>Type required amount of SSD memory (GB):</p>
                  <input id="ssd"type="number" name="ssd" min="100" max="1000" step="100" value="100" class="inputFormAppearance">
                </td>
            </tr>
            <tr>
              <td>
                <table>
                  <p >Select Software Packages:</p>
                  <tr>

                    <td>
                      <input type="checkbox" name="p1" id="p1" value="R" checked>R<br>
                      <input type="checkbox" name="p2" id="p2" value="Python" checked>Python<br>
                      <input type="checkbox" name="p3" id="p3" value="SQL Server" checked>SQL Server<br>
                      <input type="checkbox" name="p4" id="p4" value="git" checked>git<br>
                      <input type="checkbox" name="p5" id="p5" value="PHP" checked>PHP<br>
                      <input type="checkbox" name="p6" id="p6" value="Okta" checked>Okta<br>
                      <input type="checkbox" name="p7" id="p7" value="Zscaler" checked>Zscaler<br>
                      <input type="checkbox" name="p8" id="p8" value="ClipherCloud" checked>ClipherCloud<br>
                      <input type="checkbox" name="p9" id="p9" value="IOS SDK" checked>IOS SDK<br>
                      <input type="checkbox" name="p10" id="p10" value="Andriod SDK" checked>Andriod SDK<br>
                      <input type="checkbox" name="p11" id="p11" value="Xamarin" checked>Xamarin<br>
                    </td>
                    <td>
                      <input type="checkbox" name="p12" id="p12" value="Weka" checked>Weka<br>
                      <input type="checkbox" name="p13" id="p13" value="Apache Drill" checked>Apache Drill<br>
                      <input type="checkbox" name="p14" id="p14" value="Ruby" checked>Ruby<br>
                      <input type="checkbox" name="p15" id="p15" value=".NET" checked>.NET<br>
                      <input type="checkbox" name="p16" id="p16" value="IOS" checked>IOS<br>
                      <input type="checkbox" name="p17" id="p17" value="DocTrackr" checked>DocTrackr<br>
                      <input type="checkbox" name="p18" id="p18" value="Centrify" checked>Centrify<br>
                      <input type="checkbox" name="p19" id="p19" value="Vaultive" checked>Vaultive<br>
                      <input type="checkbox" name="p20" id="p20" value="React Native" checked>React Native<br>
                      <input type="checkbox" name="p21" id="p21" value="Unity" checked>Unity<br>
                  <br></td>
                </tr>

          </table>
        </td>
      </tr>
            <tr>
                <td>
                  <p >Select No of Servers:<p>
                  <select name="servers" id="servers" class="inputFormAppearance">
                    <option value="10" selected>2</option>
                    <option value="15">3</option>
                    <option value="22">4</option>
                    <option value="30">5</option>
                    <option value="37">6</option>
                  </select>
                </td>
            </tr>
            <tr>
                <td>
                  <p >Adjust No of Virtual Machines:<p>
                  <select name="vm" id="vm" class="inputFormAppearance">
                    <option value="4" selected>2</option>
                    <option value="6">3</option>
                    <option value="8">4</option>
                    <option value="10">5</option>
                    <option value="12">6</option>
                  </select>
                </td>
            </tr>
            <tr>
                <td>
                  <p>CPU used:<p>
                  <select name="cpu" id="cpu" class="inputFormAppearance">
                    <option value="3">i3</option>
                    <option value="5" selected>i5</option>
                    <option value="7">i7</option>
                  </select>
                </td>
            </tr>
          </table>

          <input id="submitIt" class="submitBttn" type="submit" value="Submit" onclick="return checkForm();">';
          }

          ?>

          <input type="text" id="hidden" name="hidden" hidden="true">
        </form>

      </tableContainerOne>

      <tableContainerTwo>

      <!-- General ------------------------------------------------------------------------------------------>

      <div style="padding-left:30px; font-size: 20px;  padding-top:15px;">Current Iaas Configuration</div>

      <divider style="margin-left:20px; margin-top: 10px; width: 380px;"></divider>

      <table width="400px;">
        <?php

        if($service != "")
        {
          echo '
          <tr>
            <td><div style="padding-left:30px; padding-top:15px;">Owner: </div></td>
            <td><div id="one" style="padding-top:15px; text-align: right;">'.$userDisplay.'</div></td>
          </tr>
          <tr>
            <td><div style="padding-left:30px; padding-top:15px;">Service Type: </div></td>
            <td><div id="one" style="padding-top:15px; text-align: right;">'.$service.'</div></td>
          </tr>
          <tr>
            <td><div style="padding-left:30px; padding-top:15px;">Cost of infrastructure: </div></td>
            <td><div id="one" style="padding-top:15px; text-align: right;">$'.$cost.' </div></td>
          </tr>
          <tr>
            <td><div style="padding-left:30px; padding-top: 10px;">Allocated RAM:</div></td>
            <td><div id="two" style="padding-top:10px; text-align: right;">'.$ram.' GB</div></td>
          </tr>
          <tr>
            <td><div style="padding-left:30px; padding-top: 10px;">SSD used:</div></td>
            <td><div id="three" style="padding-top:10px; text-align: right;">'.$ssd.'GB</div></td>
          </tr>
          <tr>
            <td><div style="padding-left:30px; padding-top: 10px;">No of Virtual Machines:</div></td>
            <td><div id="five" style="padding-top:10px; text-align: right;">'.$vm.' </div></td>
          </tr>
          <tr>
            <td><div style="padding-left:30px; padding-top: 10px;">CPU used:</div></td>
            <td><div id="six" style="padding-top:10px; text-align: right;">'.$cpu.'</div></td>
          </tr>
          <tr>
            <td><div style="padding-left:30px; padding-top: 10px;">Software Packages:</div></td><br>
          </tr>
          <tr>
            <td><div id="four" style="padding-top:10px;padding-left:30px; ">'.$output.'</div></td>
          </tr>
          </table>

          <br>
          <input style="margin-left:20px;" type="button" class="submitBttn" value="Delete Current Infrastructure" id="bttnFive"><br><br>
        ';
      }
      else {
          echo '
          <tr>
            <td><div style="padding-left:30px; padding-top:30px;">No Infrastructure has been created</div></td>
          </tr>
          </table>

          <br>';
        }

        ?>

        <a href="getquote.php"><button style="margin-left:20px;" class="submitBttn" type="submit">Create New Infrastructure</button></a><br><br>

        <br><div style="margin-left:20px;"><?= $errorNewPassword ?><br></div>
        <br>

      <tableContainerTwo>

    </tableContainer>

  </whiteBox>

  <script>

  </script>

</body>
</html>
