








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <link rel="stylesheet"type="text/css" href="css/style.css"> -->

 <!-- <link rel="stylesheet" href="css/register.css"> -->
<style>
    *{
 padding: 0;
 margin: 0;   
}

    body{
    background-image: url("Images/computer-lab.jpg");
    background-repeat: no-repeat;
    background-size: cover;

}  

.form-content{
    display: grid;
    grid-template-rows: 1fr 1fr ;
    justify-content: center;
    align-items: center;
    padding-top: 20px;
}
.form-content div{
margin: 5px 3px;
}
.form-content input{
width: 200px;
margin-top: 10px;
}


.register-body 
{
    height: 400px;
    width: 400px;
    background-color: rgb(243, 233, 233);
    margin: 100px 500px;
    /* justify-content: center; */
    /* align-items: center; */
    display: grid;
    grid-template-rows: 1fr 1fr 1fr;
    border-radius: 20px;
    
}
.register-body-content{
   
    background-color: rgb(15, 119, 6); 
    border-radius: 20px 20px 0 0;
}

.register-body .title h1
{
text-align: center;
color: white;

}
.register-navbar
{
   padding: 10px;
    
}


.register-navbar ul
{
    list-style: none;
    justify-content: center;
    display: flex;

    
}

.register-navbar ul li
{
 padding-left: 20px;
}

/* .register-navbar ul li a
{
    text-decoration: none;
    color:  white;
} */

.register-navbar ul li a
{
    width: 100px;
    display: block;
    align-items: center;
    padding: 16px 0;
    justify-content: center;
    text-decoration: none;
    font-family: Arial;
    color: rgb(255, 255, 255);
    text-align: center;
   

}
.register-navbar ul li a:hover
{
    background-color: aliceblue;
    text-transform: uppercase;
    color: black;
    border-radius: 20px;
    
    
}
.form-main{
    display: grid;
    grid-template-rows: 3fr 1fr 2fr;
    font-size: larger;
}


.form-main .form-content{
    display: grid;
    grid-template-rows: 1fr 1fr ;
    
}

/* .form-main .form-content .form-name{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 20px 5px;
}

.form-main .form-content .form-details{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 20px 5px;
}

.form-main .form-content .form-pass{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 20px 5px;
}

.form-main .form-content .depart_program{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 20px 5px;
}

.form-main .form-content .year-semester{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 20px 5px;
} */

label{
    padding-bottom: 0.2rem;
    color: black;
}
.form-main .form-content input
{
    width: 200px;
    height: 30px;
    border-radius: 10px;
    text-align: center;
    padding: 2px;
    font-size: large;
}
.form-main .form-content input::placeholder{
    padding-left: 0.6rem;
}

.form-main .form-btn{
    text-align: center;
    

}

.form-main .form-btn button{
    width: 9rem;
    height: 30px;
    border-radius: 15px;
    background-color: rgb(15, 119, 6); 
    font-size: large;
    color: white;
    /* color: white; */

}
.form-main .form-btn button:hover{
    
    background-color: rgba(15, 119, 6, 0.405); 
    color: black;

}
.form-main a{
    width: 9rem;
   height: auto;
    border-radius: 15px;
    background-color: rgb(15, 119, 6); 
    font-size: large;
    color: white;
    padding: 5px;
    text-decoration: none;
    /* color: white; */

}
.form-main a:hover{
    
    background-color: rgba(15, 119, 6, 0.405); 
    color: black;

}
.form-main .login-register-text
{
margin-top: 20px;
text-align: center;
}

</style>
</head>

<body>
<?php
session_start();
include_once '../connect.php';
if(isset($_POST['submit']))
{
    $user_id = $_POST['username'];
    $result = mysqli_query($conn,"SELECT * FROM students where firstName='" . $_POST['username'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['firstName'];
	$email_id=$row['email'];
	$password=$row['Pass'];
	if($user_id==$fetch_user_id) {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: evanschaun@gmail.com" . "\r\n" .
                "";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid userid';
				}
}
?>
    <div class="register-body">
        <div class="register-body-content">
            <div class="title">
                <h1>sign in</h1>
            </div>
            <div class="register-navbar">
                <nav>

                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../index.php">About us</a></li>
                        <!-- <li><a href="#">Register</a></li> -->
                        <li><a href="../studentreg.php">Register</a></li>
                       
                        <div style="clear: both;"></div>
                    </ul>

                </nav>
            </div>

        </div>
        <div class="register-main-section">
            
            <div class="main-section-content">
                <form action="" method="POST">
                    <div class="form-main">

                        <div class="form-content">
                        <div class="form-reg">username <br>
                                    <input type="text" class="reg" name="username" placeholder="UserName" required />

                                        <!-- <input type="text" class="reg" placeholder="Username" required /> -->
                                    </div>
    
                                    <div class="form-pass"> email <br>
                                        <input type="password" class="pass" name="email" placeholder="email" required />
                                    </div>
                                    
                                </div>
                           
                            <div class="form-btn">
                                <button type="submit" name="submit">submit</button>  
                            </div>
                            
                            </div>
                        </div>      
                    </div>
                </form>
            </div>

        </div>

        
    </div>

</body>

</html>