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

            font-weight: bolder;
        }

        .example_a {
            color: #fff !important;
            text-transform: uppercase;
            text-decoration: none;
            background: teal;
            border: 4px solid teal;
            padding: 20px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;

            transition: all 0.4s ease 0s;

            font-size: 15px;
        }

        .example_a:hover {

            letter-spacing: 1px;
            color: black;
            box-shadow: 5px 40px -10px rgba(0, 0, 0, 0.57);
            transition: all 0.4s ease 0s;
            text-decoration: none;
        }

        .tbl {
            border-collapse: collapse;
            width: 80%;
            margin-left: 10%;

        }

        .tbl tr:first-child {
            background-color: teal;
            color: white;
            font-weight: bold;
        }

        .tbl td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
    </style>
    <title>Smart Clinic</title>
</head>

<body>

    <nav class="navbar navbar-custom navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Smart Clinic</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="patient.php">Home</a></li>
                <li><a href="patient.php#contactus">Contact US</a></li>
                <li><a href="bookApp.php">Book an Appointment</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">My Profile <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="listofApp.php">My Appointments</a></li>
                        <li><a href="pre.php">My bills</a></li>
                        <li><a href="myprofile.php">My History</a></li>
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
            <h1>My Appointments</h1>
        </center>
        <br><br>
        <?php
            include('../dbcon.php');
            $email=$_SESSION['uid'];
            $s="select * from patient where email='$email'";
            $r=mysqli_query($con,$s);
            $d=mysqli_fetch_assoc($r);
            $id=$d['p_id'];
            $sql="select * from appointment where p_id='$id'";
            $run=mysqli_query($con,$sql);
            $row=mysqli_num_rows($run);
            if($row < 1)
            {
                ?>
                    <h1>you don't have any Appointments.</h1>
                    <a class="example_a" href="bookApp.php">Book Appointment</a>
                <?php
            }
            else
            {
                ?>
                    <table class="tbl">
                        <tr>
                            <td>PATIENT ID</td>
                            <td>NAME</td>
                            <td>PHONE</td>
                            <td>DOCTOR</td>
                            <td>DATE</td>
                        </tr>
                <?php
                    while($data=mysqli_fetch_assoc($run))
                    {
                        ?>
                        <tr>
                            <td><?php echo $data['p_id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td><?php echo $data['doctor']; ?></td>
                            <td><?php echo $data['date']; ?></td>
                        </tr>
                        <?php
                    }
            }
        ?>
        </table>
        <br><br>
        <center><a class="example_a" href="bookApp.php">Book Appointment</a></center>
    </div>
</body>

</html>