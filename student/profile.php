<?php

// if(!isset($_SESSION["studentID"]))
// {
//     header("Location : index.php");

// }
include '../connect.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <title>Document</title>
</head>

<body class="profile-page">
    <style>
        h2
        {
            margin-top: 30px;
            color: white;
        }
        .wrapper
        {
            background-color: green;
            align-items: center;
            display: flex;
                 width: 700px;
                 color: yellow;
                 margin: 0 auto;
                 
            height: 300px;
        }
        .wrapper .inputBox
        {
            text-align: center;
            /* margin-top: 30px; */
            height: auto;
            
        }  
        

        .wrapper input{
background-color: green;
margin: 20px 5px;
border: none;
padding-left: 5px;
font-size: large;
        }
        .wrapper label{
            margin: 0 15px;
            color: white;
        }
        .inputBox{
            padding-right: 5px ;
        }
    </style>
    <div class="wrapper">
        
        
        <form action="" method="post" enctype="multipart/form-data" >
        <h2 style="text-align: center;">Profile</h2> <hr>
            <?php
           
            $sql = "SELECT * FROM students WHERE studentID='{$_SESSION["studentID"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="inputBox">
            <label for="firstName">FIRSTNAME:</label>

                        <input type="text" id="firstName" name="firstName" placeholder="firstName" value="<?php echo $row['firstName']; ?>" disabled required>
                    </div>
                    
                    <div class="inputBox">
                    <label for="email" >EMAIL:</label>

                        <input type="text" id="email" name="email" placeholder="email" value="<?php echo $row['email']; ?>" disabled required>
                    </div>

                    <!-- <div class="inputBox">
                    <label for="Department">Department</label>

                        <input type="Department" id="Department" name="Department" placeholder="Department" value="<?php echo $row['Department']; ?>" disabled required>
                    </div> -->

                    <div class="inputBox">
                    <label for="Program">PROGRAM:</label>

                        <input type="Program" id="Program" name="Program" placeholder="Program" value="<?php echo $row['Program']; ?>" disabled required>
                    </div>
                    
                        <!-- <label for="photo">Photo</label>
                        <input type="file" accept="image/*" id="photo" name="photo" required>
                    </div>
                    <img src="uploads/<?php echo $row["photo"]; ?>" width="150px" height="auto" alt=""> -->
                    
            <?php
                }
            }

            ?>
            <div>
                <!-- <button type="submit" name="submit" class="btn">Update your profile</button> -->
            </div>
        </form>
    </div>
</body>

</html>
