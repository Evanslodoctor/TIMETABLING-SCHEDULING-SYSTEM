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
   
  .main--page{
    margin: 5px 40px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    background-color: green;

}
    .main-page{
  
    justify-content: center;
    align-items: center;
       }
    .department-form{
    display: grid;
    justify-content: center;
    align-items: center;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr;
    padding: 5px;
    color: yellow;
    font-size: large;
    font-weight: bold;
    margin: 0  auto;
}

.col-container{
    display: grid;
    grid-template-columns: 3fr 6fr;
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
.department-form input{
    /* width: 200px; */
   /* padding: 2px; */
 
 border-style: none;
 background-color: green;
 color: yellow;
 font-size: large;
  /* margin : 5px 0px; */
}

.department-form a{
        background-color: black;
        color: white;
        align-items: center;
        border-radius: 10px;
        /* padding: 6px 20px; */
        text-decoration: none;

   }
  .department-form a:hover{
        background-color:white;
        color: black;
        
}
.heading{
    text-align: center;
}


.manage--amin{
    color: yellow;
    font-size: large;
    display: grid;
    justify-content: center;
    align-items: center;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
    padding: 5px;
    border: black solid 2px;
    margin-top: 20px;
    margin-right: 10px;
    border-radius: 10px;
}
.manage--amin h1{
    color: white;

text-align: center;
}
.manage--amin button{
    background-color: black;
        color: white;
        align-items: center;
        border-radius: 10px;
        padding: 6px 20px;
        
        text-align: center;
}
.manage--amin button:hover{
        background-color:white;
        color: black;
        
}

.manage--amin input,select{
    width: 200px;
    padding: 2px;
    font-size: large;
    font-weight: bold;

 border-radius: 10px;
 text-align: center;
 border-style: none;
 background-color: white;
 color: black;
  margin : 5px 0px;
}
   </style>
    <title>add course</title>
</head>
<body>
<?php

if(isset($_POST['update'])){
    $coursestudy=mysqli_real_escape_string($conn,$_POST['coursestudy']);
$coursetitle=mysqli_real_escape_string($conn,$_POST['coursetitle']);
$coursecode=mysqli_real_escape_string($conn,$_POST['coursecode']);


    
      
                $sql="UPDATE coursestudy SET courseTitle='$coursetitle', courseCode='$coursecode' WHERE courseCode='$coursestudy'";
                $result=mysqli_query($conn,$sql);

                if($result){
                    
                    echo "<font color='red'>Congrates Your Data is updated!!!</font>";
                    //  echo  "<script>alert('Invoice sent succefully')</script>";
                
                }
                else{
                    echo "<script>alert('Something went wrog please try again!');</script>".mysqli_error($conn);
                }
            

     
}
?>

<?php

if(isset($_POST['delete'])){
    $coursestudy=mysqli_real_escape_string($conn,$_POST['coursestudy']);



    
      
                $sql="DELETE FROM coursestudy WHERE courseCode='$coursestudy'";
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
    <div class="main--page">
<form action="" method="post" enctype="multipart/form-data">
    <div class="main-page">
<div class="department-form">
    <div class="heading">
        <h1>Courses</h1><br>
        <a href='index.php?info=add_courseOffer'>Add New</a>
        <hr>
    
   <div class="col-container">
    <div class="col-id">
        Course code   
        </div>
        <div class="con-name">
        Course Title
        </div>
   </div>
   </div>
<div class="row-main-content">
<?php
                        $sql= "SELECT * FROM coursestudy";
                        $result= mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){ 
                            while($row = mysqli_fetch_assoc($result)){
                                
                                ?>

                         <div class="">
                            
                            <input type="text" name="programId" disabled value="<?php echo "  ".$row['courseCode']." "; ?>" id="programID" >
                        </div>
                                
                         <div class="">
                            
                                <input type="text" name="programId" disabled value="<?php echo "  ".$row['courseTitle']." "; ?>" id="programID" >
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
<div class="manage--amin">
    <div class="header">
        <h1>Manage Courses</h1>
     <hr>
    </div>
    <div class="course">   Course <br>
            <select name="coursestudy" class="coursestudy" id=""> 
            <option value="">Select unit</option>

            <?php

            $sql=("SELECT courseCode, courseTitle FROM coursestudy");
            $dep= mysqli_query($conn,$sql);
            while($dp=mysqli_fetch_array($dep)){
        $dp_id=$dp[0];
        echo "<option value='$dp_id'>".$dp[0]." ".$dp[1]."</option>";
        }
        ?>
            
            
            </select>
                                        
   
    <button type="submit" name="delete" class="button"> Delete</button>
    </div>

    <div class="name content">
        <label for="coursetitle">Course Title</label><br>
        <input type="text" name="coursetitle" id="coursetitle">
    </div>

    <div class="name content">
        <label for="coursecode">coursecode</label><br>
        <input type="text" name="coursecode" id="year" >
    </div>

     <div class="updateBtn">
    <button type="submit" name="update" class="button"> Update</button>
    </div>

    
    </div>
</form>

</div>
</div>
</body>
</html>