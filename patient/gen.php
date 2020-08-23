<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Insert title here</title>
    <style type="text/css">
        .outer {
            height: auto;
            width: 800px;
            background-color: khaki;
            padding: 40px;
            margin-left: 10%;
        }

        .inside {
            height: 100%;
            width: 100%;
            background-color: white;
            padding: 20px;

        }
    </style>
</head>

<body>
    <?php
        include('pre.php');
    ?>
    <br><br>
    <div class="container">
        <div class="outer">
            <div class="inside">
                    <center>
                        <h2>Smart Clinic</h2>
                        <h3>Prescription</h3>
                    </center><br><br>
                    <div class="card">

                        <div class="card-body" style="border: 1px solid gray;border-top: 5px solid teal; padding-left: 10px;padding-top: 20px;">
                        <?php
                            include('../dbcon.php');
                            $email = $_SESSION['uid'];
                            $sql = "select * from patient where email='$email'";
                            $run = mysqli_query($con, $sql);
                            $data = mysqli_fetch_assoc($run);
                            $pid = $data['p_id'];
                            $date=$_GET['date'];
                            $sql1="select * from records where date='$date' and p_id='$pid'";
                            $run1=mysqli_query($con,$sql1);
                            while($data1=mysqli_fetch_assoc($run1))
                            {
                                ?>
                                    <p class="card-title"><b>Name:</b><?php echo $data1['patient']; ?>
                                    <b style="margin-left:20%;">Patient ID:</b><?php echo $data1['p_id']; ?></p>
                                    <hr>
                                    <p class="card-text"><b>Date:</b><?php echo $data1['date']; ?></p>
                                    <p class="card-text"><b>Doctor:</b><?php echo $data1['doctor']; ?></p>
                                    <p class="card-text"><b>Symptoms:</b><?php echo $data1['symptoms']; ?></p>
                                    <p class="card-text"><b>Medicines:</b><?php echo $data1['medicine']; ?></p>
                                    <hr>
                                    <p class="card-text"><b>Fees:</b>300</p>
                                <?php      
                            }
                        ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>
