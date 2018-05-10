<?php

// Starta en session
/*session_start();
$epost = isset($_POST(['email']) ? $_POST['email'] : "";
$psw = isset($_POST(['psw']) ? $_POST['psw'] : "";


if($epost) []

?>*/
?>
<html>
  <?php include "db_connect.php" ?>
  <body>

    <form name="logginform" action="minasidor.php" method="post" onsubmit="return validateloggin()">

      <label for="uname"><b>Epost</b></label>
      <input type="text" placeholder="Ange din E-post" name="epost" >

      <label for="psw"><b>Lösenord</b></label>
      <input type="password" placeholder="Ange Lösenord" name="psw" >

      <input type="submit" value="Logga In">

    </form>

    <script src="studybuddy.js"></script>

  </body>
</html>
