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
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <title>Get A Quote</title>

    <style>

    body {  background-color: lightblue;	overflow: auto;}
    welcome {width: 100%; text-align: center; position: absolute; top: 300px; font-size: 22px;}

    .dropbtn { background-color: white;  color: black;  padding: 16px 55px 16px 0px;  text-align: center; font-size: 16px;  width: 75px; cursor: pointer;}
    .dropdown {  position: fixed;  display: inline-block; z-index: 9999999;}
    .dropdown-content { display: none;  position: absolute;  background-color: white;  width: 130px;  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);  z-index: 1;}
    .dropdown-content a { color: black;  padding: 12px 16px;  text-decoration: none;  display: block;}
    .dropdown-content a:hover { background-color: rgba(0,0,0,0.2);}
    .dropdown:hover .dropdown-content { display: block; }
    .dropdown:hover .dropbtn { background-color: white;}

    .submitBttn {
      text-align:left;
      padding: 7px 20px;
      background-color: lightblue;
    	border-color: rgba(0,0,0,0.3);
    	text-shadow: 0 1px 0 white;
    	color: black;
      width: 380px;
    }

    #config { width: 355px; z-index: 99999999;}
    #config option { width: 355px; z-index: 99999999;}

    .submitBttn {
      text-align:left;
      padding: 7px 20px;
      background-color: lightblue;
      border-color: rgba(0,0,0,0.3);
      text-shadow: 0 1px 0 white;
      color: black;
      width: 380px;
    }

    createAccountBox {background-color: #DAF0F8;	position: absolute;	width: 100%;	top: 1035px;	height: 50px;	left: 0px;}
    formBox {position: absolute; left: 15%; width: 70%; top: 30px; height: 300px; z-index: 999999;}
    heading {	position: absolute;	width: 100%;	top: 160px;	text-align: center;	left: 0px;	padding: 0px 0px;	font-size: 50px;	z-index: 9999999;}
    logInBox {background-color: white;	position: absolute;	width: 100%;	top: 350px;	height: 735px;	left: 0px; z-index: 9999; margin: 0; padding: 0;}

    </style>

    <script>

        function checkForm() {

            // Fetching values from all input fields and storing them in variables.

            var service = document.getElementById("service1").value;
            var ram = document.getElementById("ram1").value;
            var ssd = document.getElementById("ssd1").value;
            var packages = document.getElementById("packages1").value;
            var servers = document.getElementById("servers1").value;
            var vm = document.getElementById("vm1").value;

            //Check input Fields Should not be blanks.
            if (service == '0' || ram == "0" || ssd == "0" || packages == "0" || servers == "0" || vm == "0") {
                alert("Fill All Fields");
                return false;
            }
            else {
                //checking error fields
                var service1 = document.getElementById("service");
                var ram1 = document.getElementById("ram");
                var ssd1 = document.getElementById("ssd");
                var packages1 = document.getElementById("packages");
                var servers1 = document.getElementById("servers");
                var vm1 = document.getElementById("vm");

                var cost = (service + ram + ssd + packages + servers + vm);

                alert("The infrastructure configuration will cost you: \n\n" + cost + "/per month");
                return true;
            }
        }

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

  <headingBox></headingBox>

  <!-- Section One -->
  <heading>Infrastructure As A Management Tool</heading>
  <welcome>Welcome <?= $userDisplay ?></welcome>

  <logInBox>

    <formBox>

      <div style="font-size: 35px; padding-top: 20px;">Get A Quote</div>

      <form action='quotes.php' method='post' name="config" id="config">
        <table>
          <tr>
            <td>
              <p>Select Service Type:</p>
              <select name="service" id="service1">
                <option value="0">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
              <div id='service'></div>
            </td>
          </tr>
          <tr>
              <td>
                <p>Adjust amount of Allocated RAM:<p>
                <select name="ram" id="ram1">
                  <option value="0">-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                <div id='ram'></div>
              </td>
          </tr>
          <tr>
              <td>
                <p>Adjust amount of SSD memory:<p>
                <select name="ssd" id="ssd1">
                  <option value="0">-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                <div id='ssd'></div>
              </td>
          </tr>
          <tr>
              <td>
                <p>Select Software Packages (Python, Github):<p>
                <select name="packages" id="packages1">
                  <option value="0">-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                <div id='packages'></div>
              </td>
          </tr>
          <tr>
              <td>
                <p>Select of No of Servers:<p>
                <select name="servers" id="servers1">
                  <option value="0">-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
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
                  <option value="0">-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                <div id='vm'></div>
              </td>
          </tr>
        </table><br>
        <input class="submitBttn" onclick="return checkForm()" type="submit" value='Submit'>
      </form>

    </formBox>

  </logInBox>

  <createAccountBox></createAccountBox>


</body>
</html>
