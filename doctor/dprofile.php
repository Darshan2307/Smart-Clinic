<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .navbar-custom {
            background-color: white;
            font-weight: bolder;
        }
    </style>
    <title>Smart Clinic</title>
</head>

<body>

    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Smart Clinic</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="doctor.php">Home</a></li>
                <li><a href="doctor.php#contactus">Contact US</a></li>
                <li><a href="dprofile.php">My Profile</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">My Appointments <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="listofAppDoctor.php"> Appointments</a></li>
                        <li><a href="generateP.php">Give Prescription</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

            </ul>
        </div>
    </nav>

    <div class="container">
        <center>
            <h1>My Profile</h1>
            <br><br>


            <div class="card" style="width:350px">
                <?php
                include('../dbcon.php');
                $email = $_SESSION['uid'];
                $sql = "SELECT * FROM `doctor` WHERE `email`='$email'";
                $run = mysqli_query($con, $sql);
                while ($data = mysqli_fetch_assoc($run)) {
                    ?>
                    <img class="card-img-top" src="../dataimg/<?php echo $data['picture']; ?>" alt="Card image" style="width:100%;height:350px"><br><br>
                <div class="card-body" style="border: 1px solid gray;border-top: 5px solid teal;">
                    <h1 class="card-title"><?php echo $data['name']; ?></h1>
                    <p class="card-text"><b>Doctor ID:</b> <?php echo $data['d_id']; ?> </p>
                    <p class="card-text"><b>Address:</b> <?php echo $data['address']; ?> </p>
                    <p class="card-text"><b>Email:</b> <?php echo $data['email']; ?> </p>
                    <p class="card-text"><b>Phone:</b> <?php echo $data['phone']; ?> </p>
                    <p class="card-text"><b>DOB:</b> <?php echo $data['dob']; ?> </p>
                    <p class="card-text"><b>Blood group:</b> <?php echo $data['bloodgroup']; ?> </p>
                    <p class="card-text"><b>Gender:</b> <?php echo $data['gender']; ?> </p>
                </div>
                <?php
                }
                ?>
                
            </div>
        </center>
    </div>
</body>

</html>