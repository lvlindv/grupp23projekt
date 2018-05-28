<!-- Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter
    samt studentens namn och kontaktuppgifter -->
<div class="booking">
  <div class="bookingDay">
    <?php
    echo "Dag: ";
    echo $row["day"];
    ?>
  </div>

  <div class="bookingSubject">
    <?php
    echo "Ämne: ";
    echo $row["subject"];
    ?>
  </div>

<div class="coachInfo">
  <?php
  echo "Studiecoach: ";
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
