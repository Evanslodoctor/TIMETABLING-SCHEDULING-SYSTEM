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

<div class="main-page">
<?php
if(isset($_POST['submitBtn']))
{
$capacity=$_POST["capacity"];
$labName=$_POST["labName"];


$sql=("SELECT * FROM lab_room  WHERE labName='$labName'");
$result= mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)){ 
                          
      
            echo "<font color='red'>This Lab room is already exists</font>";
          }                  
              else{ 
$sql="INSERT INTO  lab_room (capacity,labName) VALUES('$capacity','$labName')";

if(mysqli_query($conn,$sql))
{
   
    echo "<font color='red'>Congrates Your Data is added!!!</font>";

   // header("location: index.php?info=add_room");
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
<div class="add-department">
    <div class="heading"><h1>Add new Laboratory</h1>
<hr></div>
  <form action="" method="post" enctype="multipart/form-data">
                    <div class="main__form">
                        <div class="form__content">
                            <div class="name content">                
                            </div>
                            <div class="name content">
                                <label for="labName">Laboratory name</label><br>
                                <input type="text" name="labName" id="labName" required>
                            </div>

                            <div class="name content">
                                <label for="capacity">Laboratory capacity</label><br>
                                <input type="text" name="capacity" id="capacity" required>
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