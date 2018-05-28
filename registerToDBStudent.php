<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Koppling till javascript-fil -->
    <script src="functions.js"></script>

    <!-- Koppling till css-fil -->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="startpage.css">
    <link rel="stylesheet" href="popUp.css">

    <title>Registrering</title>
    </head>

  <body>
  <!--klass för sidan som användaren kommer till från registerFormStudent-->
    <div class="popUp">


      <?php
      // Start the session
      session_start();

      //Koppling till databas
      include 'db_connect.php';
      include 'queries.php';

      $name = $_POST['namn'];
      $email = $_POST['email'];
      $password = $_POST['psw'];
      $phoneNr = $_POST['mnr'];

      // Kollar om email inte finns i databasen
      if (!$connection->query(checkEmail($email)))
      {
      echo "Tyvärr, emailadressen finns redan registrerad!";
      }
      else
      {
      // Lägger in studenten i databasen
      $connection->query(addStudent($name, $email, $password, $phoneNr));
      echo '<a class="userSaved">Användaren sparad!</a>';
      echo '<a href="startpage.php" class="buttonBack">Tillbaka till startsidan</a>';
      }
      $connection->close();
      ?>

    </div>
  </body>
</html>
