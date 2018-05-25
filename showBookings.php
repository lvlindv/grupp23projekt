<!-- Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter
    samt studentens namn och kontaktuppgifter -->
  <link rel="stylesheet" href="studentStartpage.css">
  <div class="booking">
  <table>
<thead>
      <tr>
       <th>Dag</th>
       <th>Ämne</th>
       <th>Studiecoach</th>
       <th>Mobilnummer</th>
       <th>Email adress</th>
     </tr>

  <div class="bookingDay">

    <td>
    <?php
    echo $row["day"];
    ?>

  <div class="bookingSubject">
    <td>
    <?php
    echo $row["subject"];
    ?>
  </div>

  <div class="coachName">
    <td>
    <?php
    echo $row["coachName"];
    ?>
  </div>

  <div class="coachNr">
    <td>
    <?php
    echo $row["coachNr"];
    ?>
  </div>

  <div class="coachEmail">
    <td>
    <?php
    echo $row["coachEmail"];
    ?>
  </div>

</thead>


  <div class="studentName">

     <tr>
     <th>Namn</th>
     <th>Mobilnummer</th>
     <th>Email adress</th>
    </tr>
    <td>
    <?php
    echo $row["studentName"];
    ?>
  </div>

  <div class="studentNr">
    <td>
    <?php
    echo $row["studentNr"];
    ?>
  </div>

  <div class="studentEmail">
    <td>
    <?php
    echo $row["studentEmail"];

    echo "<br />";
    ?>
  </td>
</td>
</td>
</td>
</td>
</td>
</td>
</td>

  </div>
</div>
