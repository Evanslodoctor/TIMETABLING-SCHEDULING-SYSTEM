
<?php
include('connect.php');
	if (isset($_POST['login']))
		{
            // Php code to allow lecturer to login into the system
			$username = mysqli_real_escape_string($conn, $_POST['username']); 
			$password = mysqli_real_escape_string($conn, $_POST['pass']);
			
			$query 		= mysqli_query($conn, "SELECT * FROM students WHERE  pass='$password' and firstName='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{	
                    
               $_SESSION['username']=$username;		
					$_SESSION['adminId']=$row['adminId'];
					header('location:student/lecturer.php'); // php header to direct lecturer page
					
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/student.css">
<style>
    body{
    background-image: url("Images/computer-lab.jpg");
    background-repeat: no-repeat;
    background-size: cover;

}   

.form-btn button
{
    margin-top: 20px;
    height: 30px;
    width: 130px;
    color: rgb(250, 246, 246);
    background-color: black; 
    border-radius: 50px; 

}
</style>
    <title>Login</title>
</head>
<body>
    <div class="login-body">
        <div class="login-body-content">
            <div class="title">
                <h1>Login Here</h1>
            </div>
            
            <div class="login-main-section">
            <li><a href="index.php">Home</a></li>

                <div class="main-section-content">
                    <form action="" method="post">
                        <div class="form-main">
    
                            <div class="form-content">
            
                                <div class="form-details">
                                    
                                    <div class="form-reg">
                                    <input type="text" class="reg" name="username" placeholder="UserName" required />

                                        
                                    </div>
    
                                    <div class="form-pass">
                                        <input type="password" class="pass" name="pass" placeholder="password" required />
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-btn">
                                <button type="submit" name="login">Login</button>
                            </div>
                            <div class="register-text">
                                <p class="register-text">Don't have an account? <a href="studentreg.php">Register</a></p>
    
    
                            </div>
                           
     
                        </div>
                    </form>
                </div>
    
            </div>
    

        </div>
    </div>
    
</body>
</html>