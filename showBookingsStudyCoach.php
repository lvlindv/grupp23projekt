<!-- Skriver ut bokningens dag, ämne, studentens namn och kontaktuppgifter -->

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

  <div class="studentInfo">
    <?php
    echo "<b>Student: </b>";
     ?>
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
</div>
