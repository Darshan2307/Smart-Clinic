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
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;



            font-size: 10px;
        }

        .example_a:hover {

            box-shadow: 5px 40px -10px rgba(0, 0, 0, 0.57);

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

        #patient {
            width: 150px;
            height: 50px;
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

        <center>
            <div>

                <form action="gen.php">
                    <select id="patient" name="date">
                        <option>Select Date</option>
                        <?php
                        include('../dbcon.php');
                        $email = $_SESSION['uid'];
                        $sql = "select * from patient where email='$email'";
                        $run = mysqli_query($con, $sql);
                        $data = mysqli_fetch_assoc($run);
                        $pid = $data['p_id'];
                        $sql1 = "select * from records where p_id='$pid'";
                        $run1 = mysqli_query($con, $sql1);
                        while ($data1 = mysqli_fetch_assoc($run1)) {
                            echo "<option value='" . $data1['date'] . "'>" . $data1['date'] . "</option>";
                        }

                        ?>
                    </select>
                    <input type="submit" class="example_a" value="See Prescription">
                </form>
            </div>
        </center>
    </div>


</body>

</html>