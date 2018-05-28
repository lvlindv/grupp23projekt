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

  <div class="studentInfo">
    <?php
    echo "Student: ";
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
