<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
  <meta charset="utf-8">

<body>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html>
