<?php

  session_save_path("/tmp");

  $loginError = $_SESSION['illegalAccess'];
   $userError = $_GET['login'];

  if ($userError == true)
    $userError = "User does not exist";
 else if ($loginError == true)
    $userError = "You must log in first";
  else
    $userError = "";

  $_SESSION['loggedin'] = "";
?>

<html>
<head>

  <link rel="stylesheet" type="text/css" href="css.css">

  <title>Login</title>
  <style>

    td, th {  text-align: left;  padding: 8px; /*border-bottom: 1px solid lightblue;*/ }
    tr:nth-child(even) { /*border-bottom: 1px solid lightblue;*/}

    whiteBox {background-color: white;	position: absolute;	width: 100%;	top: 350px;	height: 560px;	left: 0px;}
    formBox { border: 1px solid lightgrey; background-color: white; position: absolute; left: 50%; width: 512px; margin-left: -240px; top: 70px; height: 400px; z-index: 99999999; }
    formBoxError { color: #576C73; position: absolute; left: 50%; width: 200px; margin-left: 40px; top: 307px; height: 30px; z-index: 99999999; text-align: right;}
    formBoxTitle { border: 2px solid lightgrey; background-color: lightgrey; position: absolute; height: 80px; width: 480px;  padding-left: 15px; padding-right:15px;}

    a {
      color: #576C73;
      text-decoration:none;
    }

    input {
      -webkit-user-select: text;
      -moz-user-select: text;
      -ms-user-select: text;
      user-select: text;
    }

    input[type=submit]{
      background-color: lightgrey;
      width: 50%;
      height: 43px;
      white-space: normal;
      display: inline-block;
      border: 0px solid #ccc;
      border-top: 0.5px solid white;
      border-left: 0.5px solid white;
      box-sizing: border-box;
      right:0px;
    }

    input[type=reset]{
      background-color: lightgrey;
      width: 50%;
      height: 43px;
      white-space: normal;
      display: inline-block;
      border: 0px solid #ccc;
      border-top: 0.5px solid white;
      border-right: 0.5px solid white;
      box-sizing: border-box;
    }

  </style>


  <script>

      //-- Jeff ----------------------------------------------//
      function checkForm() {
            // Fetching values from all input fields and storing them in variables.

            var username = document.getElementById("userId").value;
            var submit = document.getElementById("subId").value;
            var neddih = document.getElementById("neddih").value;

            //Check input Fields Should not be blanks.
            if (username == '' || submit == '') {
                alert("Fill All Fields");
                return false;
            }
            else if (neddih != '') {
                alert("Oops")
                return false;
            }
            else {
                //Notifying error fields
                var userId = document.getElementById("username");
                var subId = document.getElementById("submit");

                return true;
            }
        }
        //---------------------------------------------------//

      </script>

</head>

<body>

  <!-- Section One -->
  <heading>Infrastructure As A Management Tool</heading>

  <!-- Section Three -->
  <whiteBox>

  <formBox>

    <formBoxTitle style="font-size: 40px; padding-top: 20px; text-align: center;">Login</formBoxTitle>

    <form autocomplete="off"  style="padding-top: 130px; padding-bottom: 10px; text-align: left;" action="checkLogin.php" method="get">

      <div style="padding-left: 15px; padding-right:15px;">
        <input value="" type="hidden" id="neddih" name="neddih">
        Username<br>
        <input type="text" id="userId" name="username" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box;">
        <div id='username'></div>

        Password<br>
        <input type="password" id="subId" name="submit" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box;">
        <div id='submit'></div><br>

        Don't have an account? <a href="signup.php">Create an account</a><br>

      </div><br>
      <buttonBox>
      <input class="button" type="reset" value="Reset"><input name = "s1" class="button" onclick="return checkForm();" type="submit" value="Submit">
    </buttonBox>
    </form>

    <formBoxError><?=$userError?></formBoxError>
  </formBox>


  </whiteBox>

</body>
</html>
