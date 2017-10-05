<?php

 
require_once('menu.php');
include "config/dbconx.php";

$sql    = 'select usercoffee from  tbl_coffeeuse WHERE userid ='.$_SESSION['userid'];
$result = mysqli_query($link,$sql );

echo  $_SESSION['username']."'s Results </br>";
 
 
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($link);
    exit;
}

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['usercoffee'];
    echo '</br>';
}

mysqli_free_result($result);
?>

<form method="POST">
    
    
     <input type="submit" name="insert"  value="SAVE">

</form>

<?php
    
    
    
    if(isset($_POST['insert'])){
    

         $sql = "insert into tbl_coffeeuse(usercoffee,coffeeid,userid ) values (NOW(),1,".$_SESSION['userid'].")";

          if(mysqli_query($link, $sql)){
           echo "Records added successfully.";
          } else{
           echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }

          // close connection
          mysqli_close($link);
    
          header('Location: coffeehistory.php');
    }
    
    
   
    
?>
    