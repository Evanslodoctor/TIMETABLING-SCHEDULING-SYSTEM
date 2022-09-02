<?php
require_once "../connect.php";


?>


<!DOCTYPE html>
<head>
    <style>
     .main__form{
         background-color: green;
         width: 480px;
         margin: 0px 300px;
         justify-content: center;
         align-items: center;
         padding: 5px 0px 40px 0px;

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
            font-size: large;
        }
    </style>
</head>
  
<body>



    
    <form action="" method="post" enctype="multipart/form-data">
                    <div class="main__form">
                    <h2>TIME TABLE</h2>
                    <hr>
                 <div class="program"> Program
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
                       <div class="submit__btn">
                            
                            <button type="submit" name="submitBtn" class="main__btn">view</button>
                        </div>
                       
                                  </div>
                        
                        

<div class="timetable">
                        </form>

    <table border="5" bgcolor="white" cellspacing="0" align="center">
    
 
        
        

            <?php
            if(isset($_POST['submitBtn']))
            {
            $programName=$_POST["program"];
            
            
            $que=mysqli_query($conn,"select * from timetable where Program='$programName' ");	
                
                    if($row=mysqli_num_rows($que))
                    {
                  
echo "<tr>";
                        
          echo "<th>Days</th>";
          $sql=("SELECT start_time, finish_time from timetable where start_time<'09:00:00' and Program='$programName' ");
          $dep= mysqli_query($conn,$sql);
          if($dp=mysqli_fetch_array($dep)){
echo "<th>$dp[0]--$dp[1]</th>";

}
$sql=("SELECT start_time, finish_time from timetable where start_time <'11:00:00' and start_time >'09:00:00' and Program='$programName' ");
$dep= mysqli_query($conn,$sql);
if($dp=mysqli_fetch_array($dep)){
echo "<th>$dp[0]--$dp[1]</th>";

}
$sql=("SELECT start_time, finish_time from timetable where start_time < '14:00:00' and start_time >'12:00:00' and Program='$programName' ");
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
                                
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Monday' and Program='$programName'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
            echo "<td>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
            
        }
            echo"</tr>";
        
            echo"<tr>";
            ?>
            <td>Tuesday</td>
                                <?php
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Tuesday' and Program='$programName'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
        }
            echo"</tr>";
                                 
            echo"<tr>";
            ?>
            <td>Wednesday</td>
                                <?php  
                                
                                $sql=("SELECT * from timetable where daysOfTheWeek='Wednesday' and Program='$programName'");
                                $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
        }
            echo"</tr>";
                               
            echo"<tr>";
            ?>
            <td>Thursday</td>
                                <?php
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Thursday' and Program='$programName'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
        }
            echo"</tr>";
                                
            echo"<tr>";
            ?>
            <td>Friday</td>
                                <?php
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Friday' and Program='$programName'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
                                 }
            echo"</tr>";
                                }
                            }
  ?>
    </table>

    </div>
</body>
  
</html>
     
    
    