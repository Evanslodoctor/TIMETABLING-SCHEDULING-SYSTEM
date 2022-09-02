<?php
require_once "connect.php";


?>


<!DOCTYPE html>
<html>
  
<body>
<a href='index.php?info=add_timetable'>Add Schedules</a>

    <h1>TIME TABLE</h1>
    <form action="showtimetable.php" method="post" enctype="multipart/form-data">
                    <div class="main__form">
    
                 <div class="program"> Program
                       <select name="program" class="program" id=""> 
                        <?php

                            $sql=("SELECT prog_name, Capacity FROM program");
                            $dep= mysqli_query($conn,$sql);
                            while($dp=mysqli_fetch_array($dep)){
                                $dp_id=$dp[0];
                                echo "<option value='$dp_id'>".$dp[0]."  "."Capacity:".$dp[1]."</option>";
                                }
                                ?>
                            
                            
                            </select>
                       </div>

                                    <div class="year">   Year Of study
                                        <select name=" yrOfStudy" class="year" id=""> 

                                        <?php

                                        $sql=("SELECT  yrOfStudy FROM yearOfStudy");
                                        $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    $dp_id=$dp[0];
                                    echo "<option value='$dp_id'>".$dp[0]."</option>";
                                    }
                                    ?>
                                        
                                       
                                        </select>
                                        </div>

                             <div class="semester">
                                        <?php

                                        $sql=("SELECT semester1, semester2 FROM semester");
                                        $result= mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($result)>0){ 
                                            while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <div class="semester">
                                       
                                           <input type="radio" name="semester" id="" value="semester 1" checked><?php echo $row['semester1'] ?><br>

                    
                                           <input type="radio" name="semester" id="" value="semester 1"><?php echo $row['semester2'] ?>
                                        </div>
                              
                                        <?php

                                        }
                                        }
                                        ?>
                                  </div>

                                  
                                  </div>

                           
                           
    
                        
                        <div class="submit__btn ">
                            
                            <button type="submit" name="submitBtn" class="main__btn">Add</button>
                        </div>
                        </form>
    <table border="5" cellspacing="0" align="center">
    
    <tr>
        
        

            <?php
            if(isset($_POST['submitBtn']))
            {
            $programName=$_POST["program"];
            $semester=$_POST["semester"];
            
            $yrOfStudy=$_POST["yrOfStudy"];
            
            $que=mysqli_query($conn,"select * from timetable where Program='$programName' AND yrOfStudy='$yrOfStudy' AND semester='$semester'");	
                
                    if($row=mysqli_num_rows($que))
                    {
                    print "<font color='red'></font>";
                    }
                    else
                    {

                        
          echo "<th>Days</th>";
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
                                
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Monday' ");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
            echo "<td>$dp[6]--$dp[7]<br>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
            
        }
            echo"</tr>";
        
            echo"<tr>";
            ?>
            <td>Tuesday</td>
                                <?php
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Tuesday'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[6]-$dp[7]<br>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
        }
            echo"</tr>";
                                 
            echo"<tr>";
            ?>
            <td>Wednesday</td>
                                <?php  
                                
                                $sql=("SELECT * from timetable where daysOfTheWeek='Wednesday'");
                                $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[6]--$dp[7]<br>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
        }
            echo"</tr>";
                               
            echo"<tr>";
            ?>
            <td>Thursday</td>
                                <?php
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Thursday'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "<td>$dp[6]--$dp[7]<br>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
        }
            echo"</tr>";
                                
            echo"<tr>";
            ?>
            <td>Friday</td>
                                <?php
                                 $sql=("SELECT * from timetable where daysOfTheWeek='Friday'");
                                 $dep= mysqli_query($conn,$sql);
                                 while($dp=mysqli_fetch_array($dep)){
                                    echo "$dp[6]--$dp[7]<br><td>$dp[3]<br>$dp[4]<br>$dp[8]</td>";
                                 }
            echo"</tr>";
                                }
                            }
  ?>
    </table>


</body>
  
</html>
     
    
    