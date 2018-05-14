<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mina sidor</title>
  </head>

  <?php
  include "db_connect.php"

  $query = "SELECT * FROM Booking";
  $result = $connection->query($query);
  ?>

  <body>

    <h2> Mina bokningar </h2><!--underrubrik-->
    <section class="myBookings"><!--ruta med bokningar-->
      <?php
        while ($row = $result->fetch_assoc()): ?>
          <div class="comment">
            <!--Skriver ut namn, epost och kommentarer-->
            <div class="commentName">
              <?php
              echo $row["name"];
              echo "<br />";
              ?>
            </div>
            <div class="commentEmail">
              <?php
              echo $row["email"];
              echo "<br />";
              ?>
            </div>
            <div class="commentPost">
              <?php
              echo $row["comment"];
              echo "<br />";
              ?>
            </div>
          </div>
      <?php endwhile; ?>
    </section>

  </body>
</html>
