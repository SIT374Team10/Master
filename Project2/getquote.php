<?php
  session_start();
  $userError = $_SESSION['userError'];
  $userDisplay = $_SESSION['loggedin'];

  if ($userDisplay == "") {
    header("Location: login.php");
    $_SESSION['illegalAccess'] = true;
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="css.css">
    <script type = "text/javascript" src="jquery-2.1.3.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <title>Get A Quote</title>

    <style>
      createAccountBox {background-color: #DAF0F8;	position: absolute;	width: 100%;	top: 1035px;	height: 50px;	left: 0px;}
      formBox {position: absolute; left: 15%; width: 70%; top: 30px; height: 300px; z-index: 999999;}
      whiteBox {background-color: white;	position: absolute;	width: 100%;	top: 350px;	height: 1010px;	left: 0px; z-index: 9999; margin: 0; padding: 0;}

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

    </style>

    <script>

        function checkForm() {

            // Fetching values from all input fields and storing them in variables.

            var service = document.getElementById("service1").value;
            var ram = document.getElementById("ram1").value;
            var ssd = document.getElementById("ssd1").value;
            //var packages = document.getElementById("packages1").value;
            var servers = document.getElementById("servers1").value;
            var vm = document.getElementById("vm1").value;
            var cpu = document.getElementById("cpu1").value;

            var service1;
            var ram1;
            var ssd1;
            //var packages1;
            var servers1;
            var vm1;
            var cpu1;

            //Check input Fields Should not be blanks.
            if (service == "0") {
                alert("Please select your service");
                return false;
            }
            else {
                //checking error fields
                service1 = document.getElementById("service");
                ram1 = document.getElementById("ram");
                ssd1 = document.getElementById("ssd");
                //packages1 = document.getElementById("packages");
                servers1 = document.getElementById("servers");
                vm1 = document.getElementById("vm");
                cpu1 = document.getElementById("cpu");

                /*service = Number(service);
                ram = Number(ram);
                ssd = Number(ssd);
                packages = Number(packages);
                servers = Number(servers);
                vm = Number(vm);
                var cost = (service + ram + ssd + packages + servers + vm);

                */
                alert("The infrastructure configuration will cost you: \n\n/per month");


                return true;
            }
        }


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
          });


    </script>

</head>
<body>

  <!-- Menu -->
    <div class="dropdown">
      <div class="dropbtn" style="font-family: 'Times New Roman', Times, serif; font-size:19px;">Menu</div>
      <div class="dropdown-content">
        <a href="login.php">Logout</a>
        <a href="monitoringPage.php">Monitoring</a>
      </div>
    </div>

  <!-- Section One -->
  <heading>Infrastructure As A Management Tool</heading>
  <welcome>Welcome <?= $userDisplay ?></welcome>

  <whiteBox>

    <formBox>

      <div style="font-size: 35px; padding-top: 20px;">Get A Quote</div>

      <form method='get' name="config" id="config" action="inputInfrastructure.php">
        <table>
          <tr>
            <td>
              <p>Select Service Type:</p>
              <select name="service" id="service1">
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
                <select name="ram" id="ram1">
                  <option value="8">8GB</option>
                  <option value="16" selected>16GB</option>
                </select>
                <div id='ram'></div>
              </td>
          </tr>
          <tr>
              <td>
                <p>Type required amount of SSD memory in GB:</p>
                <input id ="ssd1" type="number" name="ssd" min="100" max="1000" step="100" value="100">
              </td>
          </tr>
          <tr>
            <td>
              <table>
                <p>Select Software Packages</p>
                <tr>

                  <td>
                    <input type="checkbox" name="p1" id="pOne" value="R" checked>R<br>
                    <input type="checkbox" name="p2" value="Python" checked>Python<br>
                    <input type="checkbox" name="p3" value="SQL Server" checked>SQL Server<br>
                    <input type="checkbox" name="p4" value="git" checked>git<br>
                    <input type="checkbox" name="p5" value="PHP" checked>PHP<br>
                    <input type="checkbox" name="p6" value="Okta" checked>Okta<br>
                    <input type="checkbox" name="p7" value="Zscaler" checked>Zscaler<br>
                    <input type="checkbox" name="p8" value="ClipherCloud" checked>ClipherCloud<br>
                    <input type="checkbox" name="p9" value="IOS SDK" checked>IOS SDK<br>
                    <input type="checkbox" name="p10" value="Andriod SDK" checked>Andriod SDK<br>
                    <input type="checkbox" name="p11" value="Xamarin" checked>Xamarin<br>
                  </td>
                  <td>
                    <input type="checkbox" name="p12" value="Weka" checked>Weka<br>
                    <input type="checkbox" name="p13" value="Apache Drill" checked>Apache Drill<br>
                    <input type="checkbox" name="p14" value="Ruby" checked>Ruby<br>
                    <input type="checkbox" name="p15" value=".NET" checked>.NET<br>
                    <input type="checkbox" name="p16" value="IOS" checked>IOS<br>
                    <input type="checkbox" name="p17" value="DocTrackr" checked>DocTrackr<br>
                    <input type="checkbox" name="p18" value="Centrify" checked>Centrify<br>
                    <input type="checkbox" name="p19" value="Vaultive" checked>Vaultive<br>
                    <input type="checkbox" name="p20" value="React Native" checked>React Native<br>
                    <input type="checkbox" name="p21" value="Unity" checked>Unity<br>
                <br></td>
              </tr>

        </table>
      </td>
          </tr>
          <tr>
              <td>
                <p>Select of No of Servers:<p>
                <select name="servers" id="servers1">
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
                <select name="vm" id="vm1">
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
                <p>Adjust No of CPU's:<p>
                <select name="cpu" id="cpu1">

                  <option value="3">i3</option>
                  <option value="5">i5</option>
                  <option value="7">i7</option>
                </select>
                <div id='cpu'></div>
              </td>
          </tr>
        </table>
        <input id="submitIt" class="submitBttn" type="submit" value='Submit' onclick="return checkForm();">
      </form>

    </formBox>

  </whiteBox>

  <createAccountBox></createAccountBox>

<script>
</script>
</body>
</html>
