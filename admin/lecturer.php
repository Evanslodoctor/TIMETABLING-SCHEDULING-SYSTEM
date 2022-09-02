<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <style>
      
      .forms{
    display: grid;
    grid-template-columns: 1fr 1fr;
    background-color: green;
    margin: 0 10px;

      }
    .main-page{
    justify-content: center;
    align-items: center;
       }
       .department-form{
    display: grid;
    justify-content: center;
   color: yellow;
   font-size: large;
   font-weight: bold;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr;
    padding: 5px;
    margin: 0  20px;
}

.col-container{
    display: grid;
    grid-template-columns: 2fr 2fr;
}

.row-main-content{
    display: grid;
    grid-template-columns: 2fr 6fr;
}
.form-btn{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-top: 5px;
    justify-content: center;
}

.department-form h1{
color: white;

text-align: center;
}
.submit__btn{
    text-align: center;
}
.department-form input,select{
    
 border-style: none;
 background-color: green;
 color: yellow;
 font-size: large;
 
  margin : 5px 0px;
}

.department-form a{
        background-color: black;
        color: white;
        align-items: center;
        border-radius: 10px;
        padding: 6px 20px;
        text-decoration: none;

   }
  .department-form a:hover{
        background-color:white;
        color: black;
        
}
.heading{
    text-align: center;
}
.lecturer{
    margin-top: 100px;
    color: yellow;
    font-size: large;
    font-weight: bold;
    
}
.lecturer select{
    width: 300px;
    background-color: white;
    color: black;
    
}
.department-form input{
    width: 300px;
   padding: 2px;
 font-size: large;
 font-weight: bold;
 border-style: none;
 background-color: green;
 color: yellow;
  margin : 5px 0px;
}
.lecturer button{
    background-color: black;
        color: white;
        align-items: center;
        border-radius: 10px;
        padding: 6px 20px;
        
        text-align: center;
}
.lecturer button:hover{
        background-color:white;
        color: black;
        
}

.manage--amin input,select{
    width: 200px;
    padding: 2px;
 border-radius: 10px;
 text-align: center;
 border-style: none;
 background-color: rgba(255, 255, 255, 0.3);
 color: black;
  margin : 5px 0px;
}
  
   </style>
    <title>Lecturer</title>
</head>
<body>
<?php

if(isset($_POST['delete'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);



    
      
                $sql="DELETE FROM lecturer WHERE email='$email'";
                $result=mysqli_query($conn,$sql);

                if($result){
                    
                    echo "<font color='red'>Congrates Your Data is deleted!!!</font>";
                    //  echo  "<script>alert('Invoice sent succefully')</script>";
                
                }
                else{
                    echo "<script>alert('Something went wrog please try again!');</script>".mysqli_error($conn);
                }
            

     
}
?>
    <div class="forms">
<form action="" method="post" enctype="multipart/form-data">
    <div class="main-page">
<div class="department-form">
    <div class="heading">
        <h1>Lecturers</h1> <br>
        <a href='index.php?info=add_lecturer'>Add New Lecturer</a>
        <hr>
    
   <div class="col-container">
    <div class="col-id">
        Lecturer name
        </div>
        <div class="con-name">
        Lecturer email
        </div>
   </div>
   </div>
<div class="row-main-content">
<?php
                        $sql= "SELECT * FROM lecturer";
                        $result= mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){ 
                            while($row = mysqli_fetch_assoc($result)){
                                
                                ?>
                                
                         <div class="">
                            
                                <input type="text" name="programId" disabled value="<?php echo "  ".$row['userName']." "; ?>" id="programID" >
                            </div>

                            <div class="">
                                
                                <input type="text" name="programName" disabled value="<?php echo "  ".$row['email']; ?>"id="programName" required>

                            </div>
                                <?php
                            }
                        }
                        
                        ?>
</div>
     <div class="form-btn">
      <div class="add-department">
     
    
    </div>
    
  </div>

</div>


</div>
</form>
<form action="" method="post">

<div class="lecturer"> Select lecturer to Delete <br>
        <select name="email" class="program" id="">
                        <?php

                            $dep=mysqli_query($conn,"SELECT email,userName FROM lecturer");
                            while($dp=mysqli_fetch_array($dep))
                            {
                            $dp_id=$dp[0];
                            echo "<option value='$dp_id'>".$dp[0]." </option>";
                            }
                            ?>
                        
                        </select>
                                    <button type="submit" name="delete" class="button"> Delete</button>
                                    </div>
</form>
</div>
</body>
</html>