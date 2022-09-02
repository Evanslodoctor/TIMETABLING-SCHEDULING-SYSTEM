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
    background-image: url("Admin-Images/computer-lab.jpg");
    background-repeat: no-repeat;
    background-size: cover;
   
    justify-content: center;
    align-items: center;
       }
       .add-department{
    display: grid;
    justify-content: center;
    align-items: center;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr;
    padding: 3px;
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
if(isset($_POST['submitBtn']))
{
$programName=$_POST["programName"];
$departmentName=$_POST["department"];
$capacity=$_POST["capacity"];
$year=$_POST["year"];
$semester=$_POST["semester"];

$sql=("SELECT * FROM program WHERE prog_name='$programName' and semester='$semester' and year='$year' ");
$result= mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)){ 
                          
      
            echo "<font color='red'>This program is already exists</font>";
          }                  
              else{ 


$sql="INSERT INTO program (prog_name,department,Capacity,semester,year) VALUES('$programName','$departmentName','$capacity','$semester','$year')";

if(mysqli_query($conn,$sql))
{
   
    
    // $_SESSION['email']=$email;
    
    // $_SESSION['userId']=mysqli_insert_id($conn); 
    echo "<font color='red'>New program was added</font>";
    //header("location: index.php?info=add_program");
        ?>
        
        <?php
}
else{
    ?>
        <script>
            window.alert("Error ");
        </script>
        <!-- <meta http-equiv="refresh" content="2;url=signup.php" /> -->
        <?php
    echo mysqli_error($conn);
}
}
}
?>

<div class="main-page">
<div class="add-department">
    <div class="heading"><h1>Add new Program</h1>
 <hr></div>
  <form action="" method="post" enctype="multipart/form-data">
                    <div class="main__form">
                        <div class="form__content">
                        <div class="name content">
                                <label for="fname">Program name</label><br>
                                <input type="text" name="programName" id="faculty" required>
                            </div>

                            <div class="name content">
                                <label for="capacity">Capacity</label><br>
                                <input type="text" name="capacity" id="capacity" required>
                            </div>

                            <div class="name content">department <br>
                            <select name="department" class="department" id=""> 
                                <?php

                                    $dep=mysqli_query($conn,"SELECT departmentName FROM department");
                                    while($dp=mysqli_fetch_array($dep))
                                    {
                                    $dp_id=$dp[0];
                                    echo "<option value='$dp_id'>".$dp[0]."</option>";
                                    }
                                    ?>
                                
                                </select>
                            </div>


                            

                            <div class="year">   Year Of study <br>
                                        <select name="year" class="year" id=""> 
                                       

                                        <?php

                                        $sql=("SELECT  yrOfStudy FROM yearOfStudy");
                                        $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    $dp_id=$dp[0];
                                    echo "<option value='$dp_id'>".$dp[0]."</option>";
                                    }
                                    ?>
                                        
                                       
                                        </select>
                                        </div>

                             <div class="semester"> 
                                        <?php

                                        $sql=("SELECT semester1, semester2 FROM semester");
                                        $result= mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($result)>0){ 
                                            while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <div class="semester">Semester <br>
                                       
                                           <input type="radio" name="semester" id="" value="1" checked><?php echo $row['semester1'] ?><br>

                    
                                           <input type="radio" name="semester" id="" value="2"><?php echo $row['semester2'] ?>
                                        </div>
                                        <?php

                                        }
                                        }
                                        ?>
                                </div>

                        </div>
                        <div class="submit__btn ">
                            <button type="submit" name="submitBtn" class="main__btn">Add</button>
                        </div>
                    </div>
                </form>
  </div>
</div>  
</body>
</html>