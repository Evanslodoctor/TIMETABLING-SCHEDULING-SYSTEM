<?php
  require_once "connect.php";
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <link rel="stylesheet"type="text/css" href="css/style.css"> -->

<link rel="stylesheet" href="fontawesome/css/all.css">


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



 
.register-body 
{
   
    background-color: rgb(243, 233, 233);
   
    /* justify-content: center; */
    /* align-items: center; */
    display: grid;
    grid-template-rows: 2fr 9fr 1fr;
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
   
    display: block;
    align-items: center;
    padding: 10px 0;
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


.form-main .form-content{
    display: grid;
    grid-template-rows: 2fr 2fr 2fr 2fr 2fr;
    
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
    padding: 4px 0;
    border-radius: 5px;
    border: solid 1px;
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
    color: white;
    font-size: large;
    border-radius: 15px;
    background-color: rgb(15, 119, 6); 
    /* color: white; */

}
.form-main .form-btn button:hover{
    
    background-color: rgba(15, 119, 6, 0.405); 
    color: black;
}
.form-main .login-register-text
{
margin-top: 20px;
text-align: center;
}

.main-page{
    display: grid;
    grid-template-columns: 1fr 1fr ;
    justify-content: center;
    align-items: center;
    font-size: larger; 
    width: 60%;
    margin: 0 0 0 500px;
}

.form-content{
    display: grid;
    grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
    justify-content: center;
    align-items: center;
    font-size: larger;
   
    padding-bottom: 20px;
}
.form-content div{
margin: 5px 3px;
}

.form-content input,select{
    width: 400px;
    height: 30px;
    text-align: center;
    padding: 2px;
}
.form-main a{
    width: 9rem;
   height: auto;
    border-radius: 15px;
    
    font-size: large;
    color: blue;
    padding: 5px;
    text-decoration: none;
    /* color: white; */

}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "\2713";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "X";
}
</style>
</head>

<body>

<?php
if(isset($_POST['SubmitBtn'])){

   

 
 
 $UserName=$_POST['UserName'];
$email=$_POST['email'];
$Pass=$_POST['psw'];

$Program=$_POST['program'];

$sql=("SELECT * FROM students WHERE email='$email'");
$result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){ 
        ?>
        <p  style="margin:10px 400px 0 400px;padding-left:50px; color:black; font-size:xx-large;background:yellow">This user's email address is already in use!</p>;
        <?php
       // header("location: index.php?info=add_department");
      }                  
          else{

$sql=("INSERT INTO students(firstName,email,Pass,Program) VALUES('$UserName','$email','$Pass','$Program')");


if(mysqli_query($conn,$sql))
{

 
 
 //header("location:studentlog.php");
 ?>
<p style="margin:10px 400px 0 400px;padding-left:50px;background:yellow; color:black; font-size:xx-large;"> registered succesfully Go to the <a style="color:blue; font-size:xx-large; text-decoration:none;" href="studentlog.php">Login</a> page</p>
 <?php
 //header('location: studentlog.php');
     
}
else{
 ?>
     <script>
         window.alert("Error in signing up please try again");
     </script>
     <meta http-equiv="refresh" content="2;url=signup.php" />
     <?php
 echo mysqli_error($conn);
}

          }
}
?>
 <div class="main-page">
    <div class="register-body">
        <div class="register-body-content">
            <div class="title">
                <h1>Register Here</h1>
            </div>
            <div class="register-navbar">
                <nav>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php">About us</a></li>
                        <!-- <li><a href="#">Register</a></li> -->
                        <li><a href="studentlog.php">Login</a></li>
                        <!-- <div class="login">
                        <button class="loginbtn">Login</button>
                        <div class="login-content">
                            <a href="#">Student</a>
                            <a href="#">Lecturer</a>
            
                            <a href="#">Admin</a>
            
                        </div>
                    </div> -->
                        <div style="clear: both;"></div>
                    </ul>

                </nav>
            </div>

        </div>
        <div class="register-main-section">
            
            <div class="main-section-content">
                <form action="" method="POST" autocomplete="off">
                    <div class="form-main">

                        <div class="form-content">
                            
                                <div>
                                    <b><label for="firstName">UserName</label></b><br>
                                    <input type="text" class="UserName" name="UserName" placeholder="UserName" required />
                                </div>
                               
                            

                            
                                <div>
                                    <b><label for="email">Email</label></b><br>
                                    <input type="email" class="email" name="email" placeholder="Email" required />
                                </div>
                            
                         

                            
                            
                                
                                <div>Program <br>
                                <select name="program" class="program" id=""> 
                        <?php

                            
                                $sql=("SELECT prog_name,year,semester, Capacity FROM program");
                                $dep= mysqli_query($conn,$sql);
                                while($dp=mysqli_fetch_array($dep)){
                                    $dp_id=$dp[0]." ".$dp[1].".".$dp[2];

                                    echo "<option value='$dp_id'>".$dp[0]." year".$dp[1]." semester".$dp[2]."</option>";
                                    }
                                ?>
                            
                            
                            </select>
                                </div>
                            


                            
                               
                            
                                <div>
                                    <b><label for="psw">Password</label></b><br>
                                    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                                </div>
                                <div>
                                    <b><label for="conpass">Confirm Password</label></b><br>

                                    <input type="password" class="conpass" id="conpass" name="confirmPassword" placeholder="Confirm Password" onblur="matchPassword()" required />
                                </div>


                         
                       
                        <div class="form-btn">
                            <button type="submit" name="SubmitBtn">Register</button><br>
                        </div>
                        <div class="login-register-text">
                            <p class="login-register-text">Already have an account? <a href="studentlog.php">Login</a></p>
                            </div>

                        </div>

                        

                    </div>
                </form>
                
            </div>

        </div>
        

        
    </div>

    <div id="message">
                            <h3>Password must contain the following:</h3>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            </div>

   </div>
    <script>  
function matchPassword() {  
  var pw1 = document.getElementById("psw").value;  
  var pw2 = document.getElementById("conpass").value;  
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
  } else {  
    // alert("Password created successfully");  
  }  
} 

var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</body>

</html>