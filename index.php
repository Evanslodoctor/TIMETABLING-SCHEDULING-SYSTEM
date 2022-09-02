<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"type="text/css" href="css/style.css">
    <style>
.container{
    background-image: url("Images/computer-lab.jpg");
    background-repeat: no-repeat;
    background-size: cover;

} 
.contact-main{
    background-color: green;
    margin: 0;
}

/* .footer{
    background-color: black;
    color: white;
    height: 90px;
} */
    </style>
</head>
<body>
    <div class="container">
    <div class="logo">
            <h1>COMPUTER LAB ALLOCATION</h1>
    </div>
   
    <div class="main-body">
        <div class="navbar">
            <nav>
                
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#contactus">Contact us</a></li>
                    
                    <div class="login">
                        <button class="loginbtn">Register</button>
                        <div class="login-content">
                            <a href="studentreg.php">Student</a>
                           
            

            
                        </div>
                    </div>
                    <div class="login">
                        <button class="loginbtn">Login</button>
                        <div class="login-content">
                            <a href="studentlog.php">Student</a>
                            <a href="lecturer.php">Lecturer</a>
            
                            <a href="admin/adminLogin.php">Timetabler</a>
            
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </ul>

            </nav>
            <!-- End of navication section -->
        </div>
       
<!-- Body section -->
        <div class="main-section">
            <div class="main-section-content">
               <p style="color: white; font-size:large; font-family:Arial, Helvetica, serif">
                Meru University of Science and Technology timetable scheduling
               system is primarily concerned with computer laboratory allocations  by
               optimizing the algorithm used in today's timetable system's to generate a 
               feasible timetable data with fewer or no clashes.</p> 
               <br>
               <p style="color: yellow; font-size:large; font-family:Arial, Helvetica, serif"> This is achieved by assigning exactly one programme to a laboratory at a specific time to a specific lecturer.
               It also aims at making sure that the practical units are given priority over the 
               theory units in the allocation of computer laboratories.

                </p>
            
            

            </div>
            
        </div>
    </div>
    
<div class="contact-main">
    <div class="contact-main-section" id="contactus">
        <div class="contact-section-content">
            <form action="">
                <div class="contact-form-main">
                        <p><h2>Contact us</h2></p>
                        
                            <div>
                                <input type="email" class="email" placeholder="example@gmail.com" required />
                            </div>
                            
                            <div>
                                <input type="text" class="reg" placeholder="subject" required />
                            </div>

                            <div class="message">
                                <input type="text" class="pass" placeholder="message" required />
                            </div>
                
                       <div class="contact-btn">
                        <button type="Send">Send</button>
                       </div>
                      

                </div>
            </form>
        </div>
    </div>  
    </div>
    </div>
    <div class="footer" style="background-color: black; height:40px">
   <p style="text-align: center; color:white; font-size:larger; padding-top:5px"> Designed by BCS 3.2 students at Meru University of Science and Technology, 2022 © copyright</p>
    </div>
</body>
</html>

