<?php

echo "Connection worked"

 ?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit page</title>
  </head>

    <input type="hidden" name="coachId" value="<?php echo $coachId; ?>">

    <input type="text" name="name" value="<?php echo $name; ?>">
    <input type="text" name="email" value="<?php echo $email; ?>">
    <input type="text" name="password" value="<?php echo $password; ?>">
    <input type="text" name="description" value="<?php echo $description; ?>">
    <input type="text" name="phoneNr" value="<?php echo $phoneNr; ?>">

  </body>
</html>
