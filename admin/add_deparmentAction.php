<?php
require_once "connect.php";

$departmentName=$_POST["departmentName"];
$faculty=$_POST["faculty"];

$sql=("SELECT * FROM department WHERE departmentName='$departmentName'");
$result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){ 
                          
      
            echo "<font color='red'>This department already exists</font>";
            header("location: index.php?info=add_department");
          }                  
              else{

$sql="INSERT INTO department(departmentName,fk_facultyID) VALUES('$departmentName','$faculty')";

if(mysqli_query($conn,$sql))
{
   
    
    $_SESSION['email']=$email;
    //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
    $_SESSION['userId']=mysqli_insert_id($conn); 
    //header('location: products.php');  //for redirecting
    header("location: department.php");
        ?>
        <!-- <script>
            window.alert("Inserted successfully login");
        </script> -->
        <!-- <meta http-equiv="refresh" content="2;url=index.php" /> -->
        <?php
}
else{
    ?>
        <script>
            window.alert("Error ");
        </script>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    echo mysqli_error($conn);
}
}
?>