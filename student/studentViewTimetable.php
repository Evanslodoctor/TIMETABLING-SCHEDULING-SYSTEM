<?php
require_once "../connect.php";

?>


<!DOCTYPE html>
<head>
    <style>
      .student_body{
    
    justify-content: center;
    align-items: center;
       }
     .main__form{
         background-color: transparent;
       
         margin: 0 30px;
         justify-content: center;
         align-items: center;
         /* padding: 5px 0px 40px 0px; */

     }

     .program, .year{
         
         justify-content: center;
         align-items: center;
        padding-left: 50px;
         

     }
     .main__form h2{
         color: white;
         text-align: center;
     }
     .yearSem{
         display: grid;
         grid-template-columns: 1fr 1fr;
         margin-top: 10px;
     }
     .submit__btn{
         text-align: center;
         margin-top: 20px;

     }
     .submit__btn button{
              background-color: black;
              color: wheat;
              border-radius: 10px;
              padding: 6px 20px;

        }
        .submit__btn button:hover{
              background-color: white;
              color: black;
              
        }
        .timetable table{
            margin-top: 30px;
            background-color: white;
            font-size: larger;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
  
<body>
      <div class="student_body">
        <div class="main__form">
      <div class="timetable">
                        </form>

                        <?php

$sql=("SELECT start_time, finish_time from timetable where start_time<'09:00:00' and Program=''");
$dep= mysqli_query($conn,$sql);
if($dp=mysqli_fetch_array($dep)){

}

else{

                        ?>

    <table border="5" bgcolor="white" cellspacing="0" align="center">
    
 
        
        

            <?php
            
                  
echo "<tr>";
                        
          echo "<th>Days</th>";
          $sql=("SELECT start_time, finish_time from timetable where start_time<'09:00:00' and Program='{$_SESSION['Program']}' ");
          $dep= mysqli_query($conn,$sql);
          if($dp=mysqli_fetch_array($dep)){
echo "<th>$dp[0]--$dp[1]</th>";

}
$sql=("SELECT start_time, finish_time from timetable where start_time <'12:00:00' and start_time >'09:00:00' and Program='{$_SESSION['Program']}' ");
$dep= mysqli_query($conn,$sql);
if($dp=mysqli_fetch_array($dep)){
echo "<th>$dp[0]--$dp[1]</th>";

}
$sql=("SELECT start_time, finish_time from timetable where start_time < '15:00:00' and start_time >'12:00:00' and Program='{$_SESSION['Program']}' ");
$dep= mysqli_query($conn,$sql);
if($dp=mysqli_fetch_array($dep)){
echo "<th>$dp[0]--$dp[1]</th>";

}

         
                // $sql=("SELECT * from timetable");
                // $dep= mysqli_query($conn,$sql);
                // while($dp=mysqli_fetch_array($dep)){
                //     $dp_id=$dp[0];
                //     echo "<th>$dp[6]--$dp[7].</th>"; 
                // }
                echo"</tr>";
                
                    echo"<tr>";
                    ?>
            <td>Monday</td>
                                <?php
                                
                                 $sql=("SELECT lecturer,room, courseCode, daysOfTheWeek,Program from timetable where daysOfTheWeek='Monday' and Program='{$_SESSION['Program']}'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
            echo "<td>$dp[0]<br>$dp[1]<br>$dp[2]</td>";
            
        }
            echo"</tr>";
        
            echo"<tr>";
            ?>
            <td>Tuesday</td>
                                <?php
                                 $sql=("SELECT lecturer, room, courseCode,  daysOfTheWeek,Program from timetable where daysOfTheWeek='Tuesday' and Program='{$_SESSION['Program']}'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td> $dp[0]<br>$dp[1]<br>$dp[2]</td>";
        }
            echo"</tr>";
                                 
            echo"<tr>";
            ?>
            <td>Wednesday</td>
                                <?php  
                                
                                $sql=("SELECT lecturer, room, courseCode, daysOfTheWeek,Program from timetable where daysOfTheWeek='Wednesday' and Program='{$_SESSION['Program']}'");
                                $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[0]<br>$dp[1]<br>$dp[2]</td>";
        }
            echo"</tr>";
                               
            echo"<tr>";
            ?>
            <td>Thursday</td>
                                <?php
                                 $sql=("SELECT lecturer, room, courseCode, daysOfTheWeek,Program from timetable where daysOfTheWeek='Thursday' and Program='{$_SESSION['Program']}'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[0]<br>$dp[1]<br>$dp[2]</td>";
        }
            echo"</tr>";
                                
            echo"<tr>";
            ?>
            <td>Friday</td>
                                <?php
                                 $sql=("SELECT lecturer, room,courseCode, daysOfTheWeek,Program from timetable where daysOfTheWeek='Friday' and Program='{$_SESSION['Program']}'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[0]<br>$dp[1]<br>$dp[2]</td>";
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
     
    
    