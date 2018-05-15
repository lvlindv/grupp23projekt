<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
    <meta charset="utf-8">
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "red";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>

</body>
</html>
