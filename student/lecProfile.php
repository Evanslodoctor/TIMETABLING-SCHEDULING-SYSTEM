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
            color: black;
        }
        .wrapper
        {
            background-color: green;
            align-items: center;
            display: flex;
        }
        .wrapper .inputBox
        {
            text-align: center;
            /* margin-top: 30px; */
            height: auto;
            padding: 30px;
            
        }  
        .wrapper .inputBox,label
        {
            margin-left: 150px;
        }

        

 
    </style>
    <div class="wrapper">
        
        
        <form action="" method="post" enctype="multipart/form-data" >
        <h2 style="text-align: center;">Profile</h2>
            <?php
           
            $sql = "SELECT * FROM lecturer WHERE staffID='{$_SESSION["staffID"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="inputBox">
            <label for="gender">Gender: </label>

                        <input type="text" id="gender" name="gender" placeholder="gender" value="<?php echo $row['gender']; ?>" disabled required>
                    </div>
                    <div class="inputBox">
                    <label for="userName">UserName:</label>

                        <input type="userName" id="userName" name="userName" placeholder="userName" value="<?php echo $row['userName']; ?>" disabled required>
                    </div>
                    <div class="inputBox">
                    <label for="email">Email: </label>

                        <input type="text" id="email" name="email" placeholder="email" value="<?php echo $row['email']; ?>" disabled required>
                    </div>
<!--                     
                        <label for="photo">Photo</label>
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

