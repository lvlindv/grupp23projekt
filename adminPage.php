<!DOCTYPE html>
<html lang="sv" dir="ltr">
<?php include "db_connect.php" ?>
  <head>
    <meta charset="utf-8">
    <title>Admin CRUD</title>
  </head>
  <body>
     <table>
       <thead>
         <tr>
           <th>Namn</th>
           <th>Epost</th>
           <th colspan="2">Action</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td>John</td>
           <td>John@hotmail</td>
           <td>
             <a href="#">Edit</a>
           </td>
           <td>
             <a href="#">Delete</a>
           </td>
         </tr>
       </tbody>
     </table>

     <form method="post" action="db_admincrud.php">
      <div class="input-group">
        <label>Namn</label>
        <input type="text" name="namn">
      </div>
      <div class="input-group">
        <label>Epost</label>
        <input type="text" name="epost">
      </div>
      <div class="input-group">
        <button type="submit" name="Spara" class="btn">Spara</button>
      </div>
     </form>

  </body>
</html>
