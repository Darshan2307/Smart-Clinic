<?php
session_start();
if (isset($_SESSION['uid'])) {
    if ($_SESSION['occ'] == "doctor") {
        header('location:doctor/doctor.php');
    } else if ($_SESSION['occ'] == "patient") {
        header('location:patient/patient.php');
    }
    // else
    // {
    //     header('location:receptionist.php');
    // }
}
?>

<html>

<head>
    <title>LOGIN/SIGNUP</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script>
        function validate() {

            var x = document.forms["frmLogin"]["email"].value;
            var p = document.forms["frmLogin"]["password"].value;
            if (x == "" || p == "") {
                alert("Fields are empty. Enter something" + x);
                return false;
            }


            if (x.indexOf("@") == -1 || x.indexOf(".") == -1) {
                alert("incorrect email");
                return false;
            }

        }
    </script>
</head>

<body>
    <center>
        <div class="login" id="oneform">
            <h2>LogIn Here</h2>
            <div class="loginform">
                <form action="login.php" method="post" onsubmit="return validate()" name="frmLogin">
                    <div class="box">
                        <select class="occ" id="occupation" name="occp">
                            <option value="0" selected>I am a .. </option>
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div><br><br><br><br><br>

                    <div class="agile-field-txt">
                        <label> Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" />
                    </div>
                    <div class="agile-field-txt">
                        <label> password</label>
                        <input type="password" name="password" placeholder="Enter Password" id="myInput" />
                        <div class="agile_label">
                            <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
                            <label class="check" for="check3">Show password</label>
                        </div>
                        <div class="agile-right">
                            <a href="#">forgot password?</a>

                        </div>
                        <div class="agile-right">

                            <a href="signUp.php">Not having an Account? SignUp</a>
                        </div>
                    </div>
                    <!-- script for show password -->
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <input type="submit" name="log" value="SIGN IN">
                </form>

            </div>
        </div>


    </center>
</body>

</html>
<?php
include('dbcon.php');

if (isset($_POST['log'])) {
    $occ = $_POST['occp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($occ == "doctor") {
        $qry = "select * from doctor where email='$email' and password='$password'";
        $run = mysqli_query($con, $qry);
        $row = mysqli_num_rows($run);
        if ($row < 1) {
?>
            <script>
                alert("Username or Password not match !!");
                window.open('login.php', '_self');
            </script>
        <?php
        } 
        else {
            $logged_in_user = mysqli_fetch_assoc($run);
            $_SESSION['uid'] = $email;
            $_SESSION['occ'] = "doctor";
            header('location:doctor/doctor.php');
        }
    }
    else if ($occ == "admin"){
        if($email=="admin@gmail.com" && $password=="admin")
        {
            header('location:admin/admin.php');
        }
    } 
    else {
        $qry = "select * from patient where email='$email' and password='$password'";
        $run = mysqli_query($con, $qry);
        $row = mysqli_num_rows($run);
        if ($row < 1) {
        ?>
            <script>
                alert("Username or Password not match !!");
                window.open('login.php', '_self');
            </script>
<?php
        } else {
            $logged_in_user = mysqli_fetch_assoc($run);
            $_SESSION['uid'] = $email;
            $_SESSION['occ'] = "patient";
            header('location:patient/patient.php');
        }
    }
}
?>