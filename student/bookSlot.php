<?php
require_once "../connect.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .slotsMain{
          
            background-color: green;
            
        }
        .slots-form{
            margin: 10px;
            background-color: green;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
       
        padding: 10px;
        
        }
        .bookBtn{
            align-items: center;
            justify-content: center;
            margin-top: 60px;
            text-align: center;
        }
        .bookBtn button{
              background-color: black;
              color: white;
              border-radius: 10px;
              padding: 6px 20px;

        }
        .bookBtn button:hover{
              background-color:white;
              color: black;
              
        }
        .slots-form select{
           height: 30px;
        }

        .book--slot{
            border: black groove 2px ;
          justify-content: center;
          align-items: center;
          border-radius: 10px;
          padding-top: 19px;
         
        }
        .book--slot select,input{
            width: 200px;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.4);
            color: black;
            text-align: center;
            
        }
        .book--slot label,p{
            margin-left: 5px;
            color: white;
            font-size: large;
        }
        .slots{
            padding: 0px 0  0px 35px;
        }

        .book--slot h3{
            text-align: center;
            color: white;
        }
        .view--rooms{
           display: grid;
           grid-template-rows: 2fr 1fr 1fr;
          padding-top: 19px;
        }

        .view--rooms h3{
             color: white;
             text-align: center;
        }

        .view--rooms select{
             width: 200px;
             border-radius: 7px;
             text-align: center;
        }
        .view--rooms{
        border-bottom: black solid 2px;
        border-left: black solid 2px;
        border-top: black solid 2px;
        border-radius: 10px;
        }

        .available-rooms{
            display: grid;
            border-bottom: black solid 2px;
        border-right: black solid 2px;
        border-top: black solid 2px;
          padding-top: 19px;
          border-radius: 10px;
        }
        .rooms{
          padding: 0 0  0 35px;

        }
        .rooms input{
            margin-top: 5px;
            color: white;
            font-size: large;
            background-color: green;
            border-style: none;
            width: 300px;
            text-transform: capitalize;
        }

        .available-rooms h3{
            color: white;
             text-align: center; 
        }
        table{
            background-color: white;
        }
        .occcupied{
            
        }
    </style>
</head>
<body>
<?php
if(isset($_POST['book'])){
  $room=$_POST['room'];
  $days=$_POST['days'];
  $date=$_POST['date'];
  $start_time=$_POST['start_time'];
  $finish_time=$_POST['finish_time'];
  $que=mysqli_query($conn,"select * from timetable where room='$room' and start_time='$start_time' and daysOfTheWeek='$days'");	
    
  if($row=mysqli_num_rows($que))
  {
  print "<font color='red'>Room is occupied</font>";
  }
  else
  {
  $sql="INSERT INTO reserve (RoomReserved, res_date,start_time,finish_time,lecturer, email,results) VALUES('$room','$date','$start_time','$finish_time','{$_SESSION['username']}','{$_SESSION['email']}','pending')";
  if(mysqli_query($conn,$sql))
{
   
    
    echo "<font color='red'>Congrates Your reservation is send successfuly!!!</font>";
       
}
else{
   
    echo mysqli_error($conn);
}
}
}
?>
    <div class="slotsMain">
        <div class="header">

        </div>
        <div class="slots-form">

        <form action="" method="post">

       
             <div class="view--rooms">
                        <div class="header"><h3>View Occupied rooms</h3> 
                        <hr>
                    </div>
                 
                        <div class="days">
                               <select name="days" id="days">
                               <option value="">Select Day</option>
                                   <option value="Monday">Monday</option>
                                   <option value="Tuesday">Tuesday</option>
                                   <option value="Wednesday">Wednesday</option>
                                   <option value="Thursday">Thursday</option>
                                   <option value="Friday">Friday</option>
                               </select>
                      </div>
                  
                      
                           <div class="bookBtn">
                            <button type="submit" name="view">view</button>
                          </div>

                          </div>
                         
    </form>

    <form action="" method="post">
           
            <div class="book--slot">
                          
                             <div class="header">
                             <h3>Book slot</h3>
                      <hr>
                             </div>
                      <div class="slots">
                             <div class="room">
                                   <p> Laboratory</p>
                                    <select name="room" class="lab_room" id=""> 
                                    
                                    <?php

                                    $sql=("SELECT labName, capacity FROM lab_room");
                                    $dep= mysqli_query($conn,$sql);
                                    while($dp=mysqli_fetch_array($dep)){
                                        $dp_id=$dp[0];
                                        echo "<option value='$dp_id'>".$dp[0]." "."Capacity:".$dp[1]."</option>";
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
                         <div class="name content">

                            <label for="date">Date</label><br>
                                <input type="date" name="date" id="date" required>
                            </div>
                          <div class="name content">
                            <label for="start_time">Start Time</label><br>
                                <input type="time" name="start_time" id="start_time" required>
                            </div>

                            <div class="name content">
                                <label for="finish_time">Finish Time</label><br>
                                
                                <input type="time" name="finish_time" id="finish_time" required>
                            </div>
                <div class="bookBtn">
                    <button type="submit" name="book">book</button>
                </div>
                </div>
             </div>
         

            </form>  
            
            <div class="available-rooms">
                
                <div class="header">
                    <h3>Computer Laboratories</h3>
                    <hr>
                </div>
                <div class="rooms">
                  <?php

$sql= "SELECT * FROM lab_room";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_assoc($result)){
        
        ?>

 <div class="">
    
    <input type="text" name="labName" disabled value="<?php echo "  ".$row['labName']."   "." Capacity:  ".$row['capacity']; ?>" id="programID" >
</div>
        

        <?php
    }
}

                  ?>
            </div>
            </div>
            </div>
                            

<div class="occcupied">
<table border="5" bgcolor="white" cellspacing="0" align="center">
    
    
        <tr>
            <th>Time</th>
        </tr>
        
        

            <?php
            if(isset($_POST['view']))
            {
          $days=$_POST["days"];
            
          

          
                
                    echo"<tr>";

                    $sql=("SELECT start_time, finish_time from timetable where start_time<'07:00:00' and daysOfTheWeek='$days' and room IS not NULL and lecturer IS not NULL and courseCode IS not NULL ");
                        $dep= mysqli_query($conn,$sql);
                        if($dp=mysqli_fetch_array($dep)){
                                echo "<td>$dp[0] to $dp[1]</td>";

}
                   
                                 $sql=("SELECT start_time,finish_time ,room from timetable where start_time<'07:00:00' and daysOfTheWeek='$days' and room IS not NULL and lecturer IS not NULL and courseCode IS not NULL ");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                               echo "<td><br>$dp[2]</td>";
            
        }
            echo"</tr>";

            
            echo"<tr>";

            $sql=("SELECT start_time, finish_time from timetable where start_time <'10:00:00' and start_time >'07:00:00' and daysOfTheWeek='$days' and room IS not NULL and lecturer IS not NULL and courseCode IS not NULL ");
                $dep= mysqli_query($conn,$sql);
                if($dp=mysqli_fetch_array($dep)){
                        echo "<td>$dp[0] to $dp[1]</td>";

}
           
                         $sql=("SELECT start_time,finish_time ,room from timetable where start_time <'10:00:00' and start_time >'07:00:00' and daysOfTheWeek='$days' and room IS not NULL and lecturer IS not NULL and courseCode IS not NULL ");
                         $dep= mysqli_query($conn,$sql);
                         while($dp=mysqli_fetch_array($dep)){
                       echo "<td><br>$dp[2]</td>";
    
}
    echo"</tr>";

    echo"<tr>";

    $sql=("SELECT start_time, finish_time from timetable where start_time < '13:00:00' and start_time >'11:00:00' and daysOfTheWeek='$days' and room IS not NULL and lecturer IS not NULL and courseCode IS not NULL ");
        $dep= mysqli_query($conn,$sql);
        if($dp=mysqli_fetch_array($dep)){
                echo "<td>$dp[0] to $dp[1]</td>";

}
   
                 $sql=("SELECT start_time,finish_time ,room from timetable where start_time < '13:00:00' and start_time >'11:00:00' and daysOfTheWeek='$days' and room IS not NULL and lecturer IS not NULL and courseCode IS not NULL ");
                 $dep= mysqli_query($conn,$sql);
                 while($dp=mysqli_fetch_array($dep)){
               echo "<td><br>$dp[2]</td>";

}
echo"</tr>";
        
           
                                }
                            
                            
                            
  ?>
</table>
</div>

</div>                             
       
    </div>
</body>
</html>

