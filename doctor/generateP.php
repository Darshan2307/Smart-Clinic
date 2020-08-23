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

        <img alt="" src="../img/clip.png" class="top"><br><br><br>
        <div class="outer">
            <div class="inside">
                <div class="container inside">
                    <center><b>
                            <h1>Prescription</h1>
                        </b></center><br>
                    <form action="generateP.php" method="post" name="f1">
                        <div class="form-group">

                            <select class="form-control" id="patient" onchange="funct()" name="pid">
                                <option>Select Patient</option>
                                <?php
                                    include('../dbcon.php');
                                    $email=$_SESSION['uid'];
                                    $sql="select * from doctor where email='$email'";
                                    $run=mysqli_query($con,$sql);
                                    $data=mysqli_fetch_assoc($run);
                                    $doctor=$data['name'];
                                    $did=$data['d_id'];
                                    $phone=$data['phone'];
                                    $sql1="select distinct p_id from appointment where doctor='$doctor'";
                                    $run1=mysqli_query($con,$sql1);
                                    while($data1=mysqli_fetch_assoc($run1))
                                    {
                                        echo "<option value='".$data1['p_id']."'>".$data1['p_id']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id">Doctor Id:</label>
                            <input type="text" class="form-control" id="did" value="<?php echo $did ?>" name="did">
                        </div>

                        <div class="form-group">

                            <label for="name">Doctor Name:</label>
                            <input type="text" class="form-control" id="doctor" value="<?php echo $doctor ?>" name="doctor">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" value="<?php echo $phone ?>" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="symptoms">Symptoms:</label>
                            <textarea rows="3" class="form-control" name="symptoms"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="medicine">Medicine:</label>
                            <textarea rows="3" class="form-control" name="medicine"></textarea>
                        </div>


                        <input type="submit" name="sub" class="btn btn-primary" value="submit"> &nbsp;<a href="listofAppDoctor.jsp" class="btn btn-primary">Cancel</a>
                    </form>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
<?php
    if(isset($_POST['sub']))
    {
        $pid=$_POST['pid'];
        $sql3="select * from patient where p_id='$pid'";
        $run3=mysqli_query($con,$sql3);
        $d=mysqli_fetch_assoc($run3);
        $pname=$d['name'];
        $did=$_POST['did'];
        $date=$_POST['date'];
        $symptoms=$_POST['symptoms'];
        $medicine=$_POST['medicine'];
        $sql2="INSERT INTO `records`(`d_id`, `p_id`, `doctor`, `patient`, `date`, `phone`, `symptoms`, `medicine`) VALUES ('$did','$pid','$doctor','$pname','$date','$phone','$symptoms','$medicine')";
        $run2=mysqli_query($con,$sql2);
        if($run2==true)
        {
            header('location:listofAppDoctor.php');
        }
    }

?>