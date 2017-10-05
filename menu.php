<script>
           function getit(dropdown){
                var value = dropdown.options[dropdown.selectedIndex].value;
                var text = dropdown.options[value].text;
                document.getElementById("selected_text").value =value;
                document.getElementById("selected_name").value =text;
           }
          
</script>

<body id="home">  
    <form method="POST" >
                
    <div>
   
          
            <h3>Coffee App </br></h3>
            
       
<?php
       
          session_start();
          include "config/dbconx.php";
          



    $sql    = 'select userid,username from  tbl_users ';
    $result = mysqli_query($link,$sql );
//$result = mysql_query($sql, $link) or die(mysql_error($link));

    if (!$result) {
         echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysqli_error($link);
        exit;
    }


       echo "<select name=\"users\" onchange=\"getit(this)\"    >'";
       echo "<option value=0>Select User</option>";

    while ($row = mysqli_fetch_assoc($result)) {
    
         if ($row['userid'] == $_SESSION['userid']){
                echo "<option  selected ='selected' value=" .$row['userid'] . ">" . $row['username'] . "</option>"; 
         }else{
              echo "<option value=" .$row['userid'] . ">" . $row['username'] . "</option>";
        
        }
    }

    echo "</select> ";
    mysqli_free_result($result);

?>
            
    <input type="submit" name="submit" onclick="getit()" value="Profile"/>
    <input type="submit" name="Coffee" onclick="getit()" value="Coffee"/>
    <input type="hidden" name="selected_text" id="selected_text"  />
    <input type="hidden" name="selected_name" id="selected_name"  />
<?php
if(isset($_POST['submit'])){
    if($_POST['selected_text']!=""){
    $_SESSION['userid']=$_POST['selected_text'];
    $_SESSION['username']=$_POST['selected_name'];

    }
    header('Location: Profile.php');


}
if(isset($_POST['Coffee'])){
    
 if($_POST['selected_text']!=""){
    $_SESSION['userid']=$_POST['selected_text'];
    $_SESSION['username']=$_POST['selected_name'];


 }
    header('Location: coffeehistory.php');
}
?>
        

   
    </div>
        </form>
</body>
</html>