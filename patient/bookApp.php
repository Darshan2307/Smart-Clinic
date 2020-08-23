<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .outer {
            height: auto;
            width: auto;
            background-color: black;
            padding: 40px;
            z-index: 2;
        }

        .inside {
            height: 100%;
            width: 100%;
            background-color: white;
            padding: 20px;

        }

        .top {

            position: absolute;
            width: 350px;
            left: 40%;
            z-index: 1;
        }

        #doctor {
            color: black;
        }
    </style>
    <title>Insert title here</title>
</head>

<body>
    <div class="container">
        <center><b>
                <h1>Book your Appointment</h1>
            </b></center>
        <br><br>
        <img alt="" src="../img/clip.png" class="top"><br><br><br>
        <div class="outer">
            <div class="inside">
                <div class="container">
                    <form action="bookApp.php" method="post">
                        <div class="form-group">
                            <?php
                            include('../dbcon.php');
                            $email = $_SESSION['uid'];
                            $sql = "select * from patient where email='$email'";
                            $run = mysqli_query($con, $sql);
                            while ($data = mysqli_fetch_assoc($run)) {
                            ?>
                                <label for="id">Patient Id:</label>
                                <input type="text" class="form-control" id="pid" value="<?php echo $data['p_id']; ?>" name="pid">
                        </div>
                        <div class="form-group">

                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?php echo $data['name']; ?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" value="<?php echo $data['phone']; ?>" name="phone">
                        </div>

                    <?php
                            }
                    ?>

                    <div class="form-group">

                        <select class="form-control" id="doctor" name="doctor">
                            <option>Select doctor</option>
                            <?php
                            $q = "select * from doctor";
                            $r = mysqli_query($con, $q);
                            while ($d = mysqli_fetch_assoc($r)) {
                                echo "<option value='" . $d['name'] . "'>" . $d['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                    </div>

                    <input type="submit" name="subb" class="btn btn-primary" value="submit"> &nbsp;<a href="patient.php" class="btn btn-primary">Cancel</a>
                    </form>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
<?php
    if(isset($_POST['subb'])){
        $name=$_POST['name'];
        $id=$_POST['pid'];
        $phone=$_POST['phone'];
        $doc=$_POST['doctor'];
        $date=$_POST['date'];
        $query1="INSERT INTO `appointment`(`name`, `p_id`, `phone`, `doctor`, `date`) VALUES ('$name','$id','$phone','$doc','$date')";
        $run1=mysqli_query($con,$query1);
        if($run1==true)
        {
            header('location:listofApp.php');
        }
    }
?>