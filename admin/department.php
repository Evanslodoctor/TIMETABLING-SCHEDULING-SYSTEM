
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


    .main-page{
    

   
    justify-content: center;
    align-items: center;
       }

       .main--page{
        margin: 5px 40px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: green;
       }
       .department-form{
    display: grid;
    justify-content: center;
    align-items: center;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr;
    padding: 5px;
    font-size: large;
    color: yellow;
    font-weight: bold;
    
   
    
    margin: 0  auto;
}

.col-container{
    display: grid;
    grid-template-columns:2fr 8fr;
}


.form-btn{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-top: 5px;
    justify-content: center;
}
.row-main-content{
    display: grid;
    grid-template-columns: 2fr 2fr;
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
    width: 200px;
   padding: 2px;
 color: yellow;
 font-size: large;
 border-style: none;
 background-color: green;
 
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


.manage--amin{
    display: grid;
    justify-content: center;
    align-items: center;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
    padding: 5px;
    border: black solid 2px;
    margin-top: 60px;
    margin-right: 10px;
    border-radius: 10px;
    font-size: large;
    font-weight: bold;
    color: yellow;
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
 border-radius: 10px;
 text-align: center;
 border-style: none;
 background-color: white;
 color: black;
  margin : 10px 0px;
}
   </style>
    <title>Lab room</title>
</head>
<body>
    

    <?php

if(isset($_POST['update'])){
    $departmentName=mysqli_real_escape_string($conn,$_POST['departmentName']);
    $departmentId=mysqli_real_escape_string($conn,$_POST['departmentId']);
    // $phone=mysqli_real_escape_string($conn,$_POST['phone']); 
    // echo "<pre>";
    // print_r($_FILES);
    // echo "<pre>";
    
        
          
                    $sql="UPDATE department  SET departmentName='$departmentName' WHERE departmentID='$departmentId'";
                    $result=mysqli_query($conn,$sql);
    
                    if($result){
                        
                     
                         echo  "<script>alert('Updated successfully')</script>";
                    
                    }
                    else{
                        echo "<script>alert('Something went wrog please try again!');</script>".mysqli_error($conn);
                    }
                
    
         
    }

if(isset($_POST['delete'])){
    $departmentId=mysqli_real_escape_string($conn,$_POST['departmentId']);



    
      
                $sql="DELETE FROM department  WHERE departmentID='$departmentId'";
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
        <h1>Meru University Departments</h1><br>
        <a href='index.php?info=add_department'>Add New</a>
        <br>
   <hr>

   <div class="col-container">
    <div class="col-id">
        DepartmentId 
        </div>
        <div class="con-name">
        Department Name
        </div>
   </div>
   </div>
<div class="row-main-content">
<?php
                        $sql= "SELECT * FROM department";
                        $result= mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){ 
                            while($row = mysqli_fetch_assoc($result)){
                                
                                ?>
                                
                         <div class="">
                            
                                <input type="text" name="departmentId" disabled value="<?php echo "  ".$row['departmentID']." "; ?>" id="departmentID" >
                            </div>

                            <div class="">
                                
                                <input type="text" name="departmentName" disabled value="<?php echo "  ".$row['departmentName']; ?>"id="departmentName" required>

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
        <h1>Manage Departments</h1>
     <hr>
    </div>
        <div class="room"> 
        <div class="depId"> Select DepartmentId to Delete or Update<br>
    <select name="departmentId" class="department" id=""> 
                        <?php

                            $dep=mysqli_query($conn,"SELECT * FROM department");
                            while($dp=mysqli_fetch_array($dep))
                            {
                            $dp_id=$dp[0];
                            echo "<option value='$dp_id'>".$dp[0]." ".$dp[1]."</option>";
                            }
                            ?>
                        
                        </select><button type="submit" name="delete" class="button"> Delete</button>
    </div>
    <div> New name <br>
     <input type="text" name="departmentName" value=""id="departmentName" placeholder="DepartmrntName">
     </div>
     <div class="updateBtn">
    <button type="submit" name="update" class="button"> Update</button>
    </div>

    
    </div>
</form>
</div>
</body>

</html>