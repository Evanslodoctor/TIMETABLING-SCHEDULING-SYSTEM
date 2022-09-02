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
.add-department{
    margin-top: 5px;
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
$faculty=$_POST["faculty"];
$courseTitle=$_POST["coursetitle"];

$coursecode=$_POST["coursecode"];
$sql=("SELECT * FROM coursestudy WHERE courseTitle='$courseTitle'");
$result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){ 
        echo "<font color='red'>This unit already exists</font>";
       
      }                  
          else{
$sql="INSERT INTO coursestudy (faculty,courseTitle,courseCode) VALUES('$faculty','$courseTitle','$coursecode')";

if(mysqli_query($conn,$sql))
{
   
    
    echo "<font color='blue'>Congrats Your Data Saved!!!</font>";
   
        ?>
        
        <?php
}
else{
    ?>
        <script>
            window.alert("Error ");
        </script>
       
        <?php
    echo mysqli_error($conn);
}
}
}
?>
<div class="main-page">
<div class="add-department">
    <div class="heading"><h1>Add new Course</h1>
<hr></div>
  <form action="" method="post" enctype="multipart/form-data">
                    <div class="main__form">
                        <div class="form__content">
                            <div class="name content">faculty <br>
                        
                       <select name="faculty" class="faculty" id=""> 
                          <?php

                            $dep=mysqli_query($conn,"SELECT facultyName FROM faculty");
                            while($dp=mysqli_fetch_array($dep))
                            {
                            $dp_id=$dp[0];
                            echo "<option value='$dp_id'>".$dp[0]."</option>";
                            }
                            ?>
                        </select>
                       
                            </div>
                            <div class="name content">
                                <label for="coursetitle">Course Title</label><br>
                                <input type="text" name="coursetitle" id="coursetitle" required>
                            </div>

                            <div class="name content">
                                <label for="coursecode">coursecode</label><br>
                                <input type="text" name="coursecode" id="year" required>
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