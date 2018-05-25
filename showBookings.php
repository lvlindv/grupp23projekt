<!-- Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter
    samt studentens namn och kontaktuppgifter -->
<div class="booking">
  <div class="bookingDay">
    <?php
    echo $row["day"];
    ?>
  </div>

  <div class="bookingSubject">
    <?php
    echo $row["subject"];
    ?>
  </div>

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

  <div class="studentName">
    <?php
    echo $row["studentName"];
    ?>
  </div>

  <div class="studentNr">
    <?php
    echo $row["studentNr"];
    ?>
  </div>

  <div class="studentEmail">
    <?php
    echo $row["studentEmail"];

    echo "<br />";
    ?>
  </div>
</div>
