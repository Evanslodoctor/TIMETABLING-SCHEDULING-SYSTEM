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
$start_time=$_POST["start_time"];
$finish_time=$_POST["finish_time"];

$sql=("SELECT * FROM period WHERE start_time='$$start_time' or finish_time='$finish_time'");
$result= mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)){ 
                          
      
            echo "<font color='red'> exists</font>";
          }                  
              else{   

$sql="INSERT INTO  period (start_time,finish_time) VALUES('$start_time','$finish_time')";

if(mysqli_query($conn,$sql))
{
   
    
    echo "<font color='blue'>Congrats Your Data Saved!!!</font>";
    
    //header("location: index.php?info=program.php");
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
    <div class="heading"><h1>Add new Session</h1>
<hr></div>
  <form action="" method="post" enctype="multipart/form-data">
                    <div class="main__form">
                        <div class="form__content">
                            <div class="name content">                
                            </div>
                            <div class="name content">
                                <label for="start_time">Sart Time</label><br>
                                <input type="time" name="start_time" id="labName" required>
                            </div>

                            <div class="name content">
                                <label for="finish_time">Finish Time</label><br>
                                
                                <input type="time" name="finish_time" id="capacity" required>
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