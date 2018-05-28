<!-- Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter-->
<div class="booking">
  <div class="bookingDay">
    <?php
    echo "<b>Dag: </b>";
    echo $row["day"];
    ?>
  </div>

  <div class="bookingSubject">
    <?php
    echo "<b>Ämne: </b>";
    echo $row["subject"];
    ?>
  </div>

  <div class="coachInfo">
    <?php
    echo "<b>Studiecoach: </b>";
    ?>
    <div class="coachName">
      <?php
      echo $row["coachName"];
      ?>
    </div>

    <div class="coachNr">
      <?php
      echo $row["coachNr"];
      ?>
    </div>

    <div class="coachEmail">
      <?php
      echo $row["coachEmail"];
      ?>
    </div>
  </div>
</div>
