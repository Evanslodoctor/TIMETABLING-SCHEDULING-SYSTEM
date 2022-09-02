<?php
require_once "connect.php";

if(isset($_POST['submitBtn']))
{
    $departmentName=$_POST["department"];
    $programName=$_POST["program"];
    
    $lecturer=$_POST["lecturer"];
    $courseCode=$_POST["coursestudy"];
    $startTime=$_POST["start_time"];
    $finishTime=$_POST["end_time"];
    $room=$_POST["room"];
    

$days=$_POST["days"];


$que=mysqli_query($conn,"select * from timetable where room='$room' and start_time='$startTime' and daysOfTheWeek='$days'");	
    
        if($row=mysqli_num_rows($que))
        {
        print "<font color='red'bgcolor='white'>Room is occupied</font>";
        }
        else
        {
            $que=mysqli_query($conn,"select * from timetable where Program='$programName' and start_time='$startTime' and daysOfTheWeek='$days'");	
    
        if($row=mysqli_num_rows($que))
        {
            
        print "<font color='red' bgcolor='white'>This program is in another session at this time</font>";
        }
        else
        {
            $que=mysqli_query($conn,"select * from timetable where lecturer='$lecturer' and start_time='$startTime' and daysOfTheWeek='$days'");	
    
            if($row=mysqli_num_rows($que))
            {
            print "<font color='red' bgcolor='white'>Lecturer as another class at this time</font>";
            }
            else
            {
$sql="INSERT INTO timetable (department,Program,lecturer,courseCode,daysOfTheWeek,start_time,finish_time,room) VALUES('$departmentName','$programName','$lecturer','$courseCode','$days','$startTime','$finishTime','$room')";

if(mysqli_query($conn,$sql))
{




//     $que=mysqli_query($conn,"select * from timetable where Program='$programName' and semester='$semester' and lecturer='$lecturer' and courseCode='$courseCode' and start_time='$startTime' and room='$room' ");	
    
//         if($row=mysqli_num_rows($que))
//         {
//         print "<font color='red'>This user already exists</font>";
//         }
//         else
//         {
// $sql="INSERT INTO timetable (department,Program,semester,lecturer,courseCode
// ,start_time,finish_time,room) VALUES('$departmentName','$programName','$semester','$lecturer','$courseCode','$startTime','$finishTime','$room')";

// if(mysqli_query($conn,$sql))
// {
   
    
    // $_SESSION['email']=$email;
    
    // $_SESSION['userId']=mysqli_insert_id($conn); 
    echo "<font color='blue' bgcolor='white'>Congrats Your Data is Saved!!!</font>";
    //header("location: index.php?info=add_timetable");
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
 }
}
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
       .add-timetable{
           
           width: 620px;
           background-color: green;
           justify-content: center;
           align-items: center;
           margin: 10px 250px;
           
       }
.add-timetable h1{
    color: white;
    text-align: center;
    padding: 5px 0;
}
       .main__form{
           display: grid;
           grid-template-rows: 9fr 1fr;
           margin: 10px 20px;
           font-size: larger;
           font-weight: 600;
       }
       .form__content
       {
        display: grid;
           grid-template-rows: 3fr 3fr 3fr 3fr;
       }

       .dep_prog{
        display: grid;
           grid-template-columns: 1fr 1fr;
       }
       .lec_code{
        display: grid;
           grid-template-columns: 1fr 1fr;
       }
       .main__form select{
           width: 230px;
           border-radius: 10px;
           padding: 5px;
       }
       .room_sem{
        display: grid;
           grid-template-columns: 1fr 1fr;
       }

       .time_slots{
        display: grid;
           grid-template-columns: 1fr 1fr;
       }
       .submit__btn{
           align-items: center;
           justify-content: center;
           text-align: center;
       }
       .main__form button{
          
           width: 150px;
           background-color: black;
           color: white;
           padding: 5px;
           text-align: center;
           border-radius: 20px;
           margin-right: 20px;
       }

       .main__form button:hover{
          
        
          background-color: white;
          color: black;
         /* text-transform: uppercase */
          
      }


  </style>
</head>
<body>
    <?php
    if(isset($_POST['sendEmail'])){
        $programName=$_POST["program"];
        $sqlreminder = mysqli_query($conn,"SELECT firstName, email, Program FROM students");
        $lecturers = mysqli_fetch_all($sqlreminder,MYSQLI_ASSOC);
        foreach($lecturers as $lecturers){
            // send email reminder=================================
            
            $email = $lecturers['email'];
            $name = $lecturers['firstName'];
            $program = $lecturers['Program'];
            //$time = $patient['tyme'];
            //$dname = $patient['dname'];
            
            
                $to = $email;
                $subject = "$program Timetable";
        
                $message = "How are you $name? $program timetable is now available in your portal. ";
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
                // More headers
                $headers .= 'From: <evanschaun@gmail.com>' . "\r\n";
        
        
                if(mail($to,$subject,$message,$headers)){
                    echo "sent successfully";
                }else{
                    //echo "<script>alert('reminders');</script>";
                }
        }
    }
    ?>
<div class="main-page">
<div class="add-timetable">
    <div class="heading"><h1>Add class schedule</h1></div>
    <hr>
  <form action="" method="post" enctype="multipart/form-data">
                    <div class="main__form">
                        <div class="form__content">
                        <div class="dep_prog">
                        <div class="depatment">
                          Department<br>
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
                       <div class="program"> Program<br>
                       <select name="program" class="program" id=""> 
                           
                        <?php

                            $sql=("SELECT prog_name,year,semester, Capacity FROM program");
                            $dep= mysqli_query($conn,$sql);
                            while($dp=mysqli_fetch_array($dep)){
                                $dp_id=$dp[0]." ".$dp[1].".".$dp[2];

                                echo "<option value='$dp_id'>".$dp[0]." year".$dp[1]." semester".$dp[2]." "."Capacity:".$dp[3]."</option>";
                                }
                                ?>
                            
                            
                            </select>
                       </div>
                       </div>
                       <div class="lec_code">
                       
                              <div class="lecturer">Lecturer<br>
                            <select name="lecturer" class="lecturer" id=""> 
                            <option value=""></option>
                         <?php

                                $sql=("SELECT userName FROM lecturer");
                                $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    $dp_id=$dp[0];
                                    echo "<option value='$dp_id'>".$dp[0]."</option>";
                                    }
                                    ?>
                                </select>
                                </div>

                             <div class="course">   Course <br>
                                        <select name="coursestudy" class="coursestudy" id=""> 
                                        <option value=""></option>

                                        <?php

                                        $sql=("SELECT courseCode, courseTitle FROM coursestudy");
                                        $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    $dp_id=$dp[0];
                                    echo "<option value='$dp_id'>".$dp[0]." ".$dp[1]."</option>";
                                    }
                                    ?>
                                        
                                       
                                        </select>
                                        </div>
                       
                            </div>
                                  <div class="room_sem">
                                  <div class="room">
                                    Laboratory<br>
                                    <select name="room" class="lab_room" id=""> 
                                    <option value=""></option>
                                    <?php

                                    $sql=("SELECT labName, capacity FROM lab_room");
                                    $dep= mysqli_query($conn,$sql);
                                    while($dp=mysqli_fetch_array($dep)){
                                        $dp_id=$dp[0];
                                        echo "<option value='$dp_id'>.".$dp[0]." "."Capacity:".$dp[1]."</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>

                                    <div class="days"> Days<br>
                               <select name="days" id="days">
                                   <option value="Monday">Monday</option>
                                   <option value="Tuesday">Tuesday</option>
                                   <option value="Wednesday">Wednesday</option>
                                   <option value="Thursday">Thursday</option>
                                   <option value="Friday">Friday</option>
                               </select>
                           </div>
                                  </div>

                           <div class="time_slots">

                           
                           <div class="start_time">
                                  Start Time<br>
                                <select name="start_time" class="start_time" id=""> 
                                <?php

                                $sql=("SELECT start_time FROM period");
                                $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    $dp_id=$dp[0];
                                      echo "<option value='$dp_id'>".$dp[0]."</option>"; 
                                      
                                    }
                                    ?>
                                
                                
                                </select>
                                </div>


                                <div class="end_time"> Finish time<br>
                                <select name="end_time" class="end_time" id=""> 
                                <?php

                                $sql=("SELECT finish_time FROM period");
                                $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    $dp_id=$dp[0];
                                      
                                      echo "<option value='$dp_id'>".$dp[0]."</option>";
                                    }
                                    ?>
                                
                                
                                </select>
                                </div>
                           </div>

                        </div>
                        <div class="submit__btn ">
                            <button type="submit" name="submitBtn" class="main__btn">Add</button>
                            <button type="submit" name="sendEmail" class="main__btn">Email notification</button>
                        </div>
                    </div>
                </form>
  </div>
</div>  
</body>
</html> 






