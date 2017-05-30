<?php
  session_start();
  $userError = $_SESSION['userError'];
  $userDisplay = $_SESSION['loggedin'];

  if ($userDisplay == "") {
    header("Location: login.php");
    $_SESSION['illegalAccess'] = true;
  }

    $dbuser = "dgbr";
    $dbpass = "ilovecows";
    $db = "SSID";
    $connect = oci_connect($dbuser, $dbpass, $db);

    if (!$connect) {
        echo "An error occurred connecting to the database";
        exit;
    }

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

    $sqlTwo = "SELECT * FROM infrastructure WHERE ID = '{$current}' AND USERNAME = '{$userDisplay}'";

    $stmtTwo = oci_parse($connect, $sqlTwo);

    if(!$stmtTwo)  {
      echo "An error occurred in parsing the sql string.\n";
      exit;
    }

    oci_execute($stmtTwo);

    while(oci_fetch_array($stmtTwo)) {
  	    $id = oci_result($stmtTwo,"ID");
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

  </style>


  <script type="text/javascript">

    $(document).ready(function(){

      $("#submitIt").hide();

      $("#bttnOne").click(function(){

        var value = document.getElementById("service1").value;
        var test = true;

        if (value == "Data Science" || value == "Software Developer" || value == "IT Security" || value == "Mobile App Developer"){
          $("#submitIt").show();
        }
        else {
          alert("You must select a service");
        }

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

      $("#bttnTwo").click(function(){
        $("body").append('<changePassword style="padding-top:50px;" id="change"><div style="margin-left:50px;font-size: 20px; padding-top:15px; width:100%;">Change Password</div><br><input style="margin-left:50px; width: 300px;" type="text" id="old" placeholder="Enter old password"><input style="margin-left:50px; width: 300px; margin-top:10px;" type="text" id="new" placeholder="Enter your new password"><input style="margin-left:50px; width: 300px; margin-top:10px;" type="text" id="newTwo" placeholder="Reenter your new password"><br><input style="margin-top:20px;" type="button" class="submitBttnTwo" value="Submit" id="bttnThree"></changePassword>');
        $("#bttnThree").click(function(){


          var old = document.getElementById("old").value;
          var newOne = document.getElementById("new").value;
          var newTwo = document.getElementById("newTwo").value;

          var old1;
          var newOne1;
          var newTwo1;

          if (old == "" || newOne == "" || newTwo == "") {
              alert("All forms must be filled in");
          }
          else {
              //checking error fields
              old1 = document.getElementById("old").value;
              newOne1 = document.getElementById("new").value;
              newTwo1 = document.getElementById("newTwo").value;
        }

        $( "body" ).load( "checkNewPassword.php" );
        });
      });


    });

  </script>

</head>

<body>

  <!-- Menu -->
    <div class="dropdown">
      <div class="dropbtn" style="font-family: 'Times New Roman', Times, serif; font-size:19px;">Menu</div>
      <div class="dropdown-content">
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

        <div style="padding-left:10px; font-size: 20px; padding-top:15px;">Update IaaS Configuration</div>
        <divider style="margin-right:20px; margin-top: 10px; width: 380px;"></divider>

        <form method='get' name="config" id="config" style="padding-top: 20px;" action="updateInfrastructure.php">
          <table>
            <tr>
              <td>
                <p>Select Service Type:</p>
                <select name="service" id="service1" class="inputFormAppearance">
                  <option value="0">-</option>
                  <option value="Data Science">Data Science</option>
                  <option value="Software Developer">Software Developer</option>
                  <option value="IT Security">IT Security</option>
                  <option value="Mobile App Developer">Mobile App Developer</option>
                </select>
                <div id='service'></div><br>
                <input type="button" class="submitBttn" value='Submit' id="bttnOne">
              </td>
            </tr>
            <tr>
                <td>
                  <p>Adjust amount of Allocated RAM:<p>
                  <select name="ram" id="ram1" class="inputFormAppearance">
                    <option value="8">8GB</option>
                    <option value="16" selected>16GB</option>
                  </select>
                  <div id='ram'></div>
                </td>
            </tr>
            <tr>
                <td>
                  <p>Type required amount of SSD memory (GB):</p>
                  <input id="ssd1"type="number" name="ssd" min="100" max="1000" step="100" value="100" class="inputFormAppearance">
                  <div id='ssd'></div>
                </td>
            </tr>
            <tr>
              <td>
                <table>
                  <p>Select Software Packages:</p>
                  <tr>

                    <td>
                      <input type="checkbox" name="p1" id="PR" value="R" >R<br>
                      <input type="checkbox" name="p2" value="Python" >Python<br>
                      <input type="checkbox" name="p3" value="SQL Server" >SQL Server<br>
                      <input type="checkbox" name="p4" value="git" >git<br>
                      <input type="checkbox" name="p5" value="PHP" >PHP<br>
                      <input type="checkbox" name="p6" value="Okta" >Okta<br>
                      <input type="checkbox" name="p7" value="Zscaler" >Zscaler<br>
                      <input type="checkbox" name="p8" value="ClipherCloud" >ClipherCloud<br>
                      <input type="checkbox" name="p9" value="IOS SDK" >IOS SDK<br>
                      <input type="checkbox" name="p10" value="Andriod SDK" >Andriod SDK<br>
                      <input type="checkbox" name="p11" value="Xamarin" >Xamarin<br>
                    </td>
                    <td>
                      <input type="checkbox" name="p12" value="Weka" >Weka<br>
                      <input type="checkbox" name="p13" value="Apache Drill" >Apache Drill<br>
                      <input type="checkbox" name="p14" value="Ruby" >Ruby<br>
                      <input type="checkbox" name="p15" value=".NET" >.NET<br>
                      <input type="checkbox" name="p16" value="IOS" >IOS<br>
                      <input type="checkbox" name="p17" value="DocTrackr" >DocTrackr<br>
                      <input type="checkbox" name="p18" value="Centrify" >Centrify<br>
                      <input type="checkbox" name="p19" value="Vaultive" >Vaultive<br>
                      <input type="checkbox" name="p20" value="React Native" >React Native<br>
                      <input type="checkbox" name="p21" value="Unity" >Unity<br>
                  <br></td>
                </tr>

          </table>
        </td>
      </tr>
            <tr>
                <td>
                  <p>Select of No of Servers:<p>
                  <select name="servers" id="servers1" class="inputFormAppearance">
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                  <div id='servers'></div>
                </td>
            </tr>
            <tr>
                <td>
                  <p>Adjust No of Virtual Machines:<p>
                  <select name="vm" id="vm1" class="inputFormAppearance">
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                  <div id='vm'></div>
                </td>
            </tr>
            <tr>
                <td>
                  <p>CPU used:<p>
                  <select name="cpu" id="cpu1" class="inputFormAppearance">
                    <option value="3">i3</option>
                    <option value="5"selected>i5</option>
                    <option value="7">i7</option>
                  </select>
                  <div id='cpu'></div>
                </td>
            </tr>
          </table><br>
          <input id="submitIt" class="submitBttn" type="submit" value='Submit' onclick="">
        </form>

        <a href="getquote.php"><button class="submitBttn" type="submit">Create New Infrastructure</button></a>

      </tableContainerOne>

      <tableContainerTwo>

      <!-- General ------------------------------------------------------------------------------------------>

      <div style="padding-left:30px; font-size: 20px;  padding-top:15px;">Current Iaas Configuration</div>
      <divider style="margin-left:20px; margin-top: 10px; width: 380px;"></divider>

      <table width="400px;">
        <tr>
          <td><div style="padding-left:30px; padding-top:15px;">Service Type: </div></td>
          <td><div id="one" style="padding-top:15px; text-align: right;"><?= $service ?></div></td>
        </tr>
        <tr>
          <td><div style="padding-left:30px; padding-top: 10px;">Allocated RAM:</div></td>
          <td><div id="two" style="padding-top:10px; text-align: right;"><?= $ram ?>GB</div></td>
        </tr>
        <tr>
          <td><div style="padding-left:30px; padding-top: 10px;">SSD used:</div></td>
          <td><div id="three" style="padding-top:10px; text-align: right;"><?= $ssd ?>GB</div></td>
        </tr>
        <tr>
          <td><div style="padding-left:30px; padding-top: 10px;">No of Virtual Machines:</div></td>
          <td><div id="five" style="padding-top:10px; text-align: right;"><?= $vm ?></div></td>
        </tr>
        <tr>
          <td><div style="padding-left:30px; padding-top: 10px;">CPU used:</div></td>
          <td><div id="six" style="padding-top:10px; text-align: right;">i<?= $cpu ?></div></td>
        </tr>
        <tr>
          <td><div style="padding-left:30px; padding-top: 10px;">Software Packages:</div></td><br>
        </tr>
        <tr>
          <td><div id="four" style="padding-top:10px;padding-left:30px; "><?= $output ?></div></td>
        </tr>


      </table><br><br>

      <input style="margin-left:20px;" type="button" class="submitBttn" value='Change Password' id="bttnTwo">

      <br>

      <tableContainerTwo>

    </tableContainer>

  </whiteBox>

  <script>

  </script>

</body>
</html>
