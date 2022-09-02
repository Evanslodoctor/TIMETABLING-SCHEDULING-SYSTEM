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
    color: yellow;
    font-size: large;
    font-weight: bold;
    justify-content: center;
    align-items: center;
    align-items: center;
    grid-template-rows: 1fr 1fr 1fr;
    padding: 5px;
    
   
    
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
 font-size: large;
 color: yellow;
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
    color: yellow;
    font-size: large;
    grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
    padding: 5px;
    border: black solid 2px;
    margin-top: 60px;
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
 border-radius: 10px;
 text-align: center;
 border-style: none;
 background-color: white;
 font-size: large;
 color: black;
  margin : 5px 0px;
}
   </style>
    <title>Lab room</title>
</head>
<body>
    

    <?php

if(isset($_POST['update'])){
    $room=mysqli_real_escape_string($conn,$_POST['room']);
$lab=mysqli_real_escape_string($conn,$_POST['lab']);
$capacity=mysqli_real_escape_string($conn,$_POST['capacity']);


    
      
                $sql="UPDATE lab_room   SET labName='$lab', capacity='$capacity' WHERE labName='$room'";
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
    $room=mysqli_real_escape_string($conn,$_POST['room']);



    
      
                $sql="DELETE FROM lab_room  WHERE labName='$room'";
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
        <h1>Computer Laboratories</h1><br>
        <a href='index.php?info=add_room'>Add New</a>
   <hr>

   <div class="col-container">
    <div class="col-id">
        Laboratory Name 
        </div>
        <div class="con-name">
        Capacity
        </div>
   </div>
   </div>
<div class="row-main-content">
<?php
                        $sql= "SELECT * FROM lab_room";
                        $result= mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){ 
                            while($row = mysqli_fetch_assoc($result)){
                                
                                ?>

                         <div class="">
                            
                            <input type="text" name="labName" disabled value="<?php echo "  ".$row['labName']." "; ?>" id="programID" >
                        </div>
                                
                         <div class="">
                            
                                <input type="text" name="labcapacity" disabled value="<?php echo "  ".$row['capacity']." "; ?>" id="programID" >
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
        <h1>Manage computer Laboratories</h1>
     <hr>
    </div>
        <div class="room"> Lab Name <br>
    <select name="room" class="lab_room" id=""> 
                                    <option value="">Select laboratory</option>
                                    <?php

                                    $sql=("SELECT labName, capacity FROM lab_room");
                                    $dep= mysqli_query($conn,$sql);
                                    while($dp=mysqli_fetch_array($dep)){
                                        $dp_id=$dp[0];
                                        echo "<option value='$dp_id'>.".$dp[0]." "."Capacity:".$dp[1]."</option>";
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="delete" class="button"> Delete</button>
                                    </div>

     <div class="name"> New Lab name <br>
     <input type="text" name="lab" value=""id="lab" placeholder="lab" >
     </div>
     <div class="capacity">Capacity <br>
     <input type="text" name="capacity" value=""id="capacity" placeholder="capacity" >
     </div>

     <div class="updateBtn">
    <button type="submit" name="update" class="button"> Update</button>
    </div>

    
    </div>
</form>
</div>
</body>

</html>