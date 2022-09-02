<?php
require_once "connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <style>
      .main-page{
   
    justify-content: center;
    align-items: center;
       }
       .add-department{
    display: grid;
    justify-content: center;
    align-items: center;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr;
    padding: 5px;
    background-color: green;
   
    width: 500px;
    margin: 0  auto;
}

.add-department h1{
color: white;
text-align: center;
}
.submit__btn{
    text-align: center;
}
.add-department input,select{
    width: 200px;
   padding: 2px;
  border-radius: 10px;
  text-align: center;
  margin-top: 5px;
}

.add-department button{
              background-color: black;
              color: white;
             align-items: center;
              border-radius: 10px;
              padding: 6px 20px;

        }
  .add-department button:hover{
        background-color:white;
        color: black;
        
}
  </style>
</head>
<body>

<?php
if(isset($_POST['add'])){
    $departmentName=$_POST["departmentName"];
$faculty=$_POST["facultyId"];

$sql=("SELECT * FROM department WHERE departmentName='$departmentName'");
$result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){ 
                          
      
            echo "<font color='red'>This department already exists</font>";
            
          }                  
              else{

$sql="INSERT INTO department(departmentName,fk_facultyID) VALUES('$departmentName','$faculty')";

if(mysqli_query($conn,$sql))
{
   
    echo "<font color='red'>Congrates Your Data is inserted!!!</font>"; 
    
    
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
}
?>
<div class="main-page">
<div class="add-department">
    <div class="heading"><h1>Add new Department</h1>
<hr></div>
  <form action="" method="post">
                    <div class="main__form">
                        <div class="form__content">
                            <div class="first__name content">
                                <label for="fname">Department name</label><br> <br>
                                <input type="text" name="departmentName" id="derpname" required>
                            </div>

                            <div class="first__name content">
                               Faculty Id <br>
                               <select name="facultyId" class="Faculty" id=""> 
                        <?php

                            $dep=mysqli_query($conn,"SELECT * FROM faculty");
                            while($dp=mysqli_fetch_array($dep))
                            {
                            $dp_id=$dp[0];
                            echo "<option value='$dp_id'>".$dp[0]." ".$dp[1]."</option>";
                            }
                            ?>
                        
                        </select>
                            </div>
                        </div>
                        <div class="submit__btn ">
                            <button type="submit" name="add" class="main__btn">Add</button>
                        </div>
                    </div>
                </form>
  </div>
</div>  
</body>
</html>