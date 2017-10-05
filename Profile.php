<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Profile</title>
    </head>
    <body>
        <?php
        require_once('menu.php');
      
      
      
      //print_r($_SESSION); 

           
        ?>
        
        <html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Profile</title>
</head>
<body>
<?php
    $sql    = 'select username,fullname from  tbl_users WHERE userid = '.$_SESSION['userid'];
    $result = mysqli_query($link,$sql );
    //$result = mysql_query($sql, $link) or die(mysql_error($link));

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysqli_error($link);
        exit;
    }

  ?>
    
    
<form  method="POST">
    <p>
    <label for="UserName">UserName:</label>
<?php
     while ($row = mysqli_fetch_assoc($result)) {
     echo '<input type="text" name="user_name" id="user_name" value="'.$row['username'].'">';
               
    echo ' </p>';
    echo ' <p>';
     echo ' <label for="FullName">Full Name:</label>';
     echo '  <input type="text" name="full_name" id="full_name"  value="'.$row['fullname'].'">';
     }
     mysqli_free_result($result);
?>
    </p>

    <input type="submit" name="update"  value="SAVE">
</form>
    
    
    <?php
    
    
    
    if(isset($_POST['update'])){
    

            $user_name =$_POST['user_name'];
            $full_name = $_POST['full_name'];



          // in case insertion is needed later
          //$sql = "INSERT INTO tbl_users (username, fullname) VALUES ('.$user_name.', '.$full_name.')";

          $sql = "update tbl_users set username= '$user_name', fullname ='$full_name'  where userid=".$_SESSION['userid'];


          if(mysqli_query($link, $sql)){
           echo "Records added successfully.";
          } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }

          // close connection
          mysqli_close($link);
    
          header('Location: Profile.php');
    }
    
    
   
    
    ?>
    
    
    
</body>
</html>
    </body>
</html>
