<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = mysqli_connect("localhost", "root", "root", "login_database", 3300);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit_emp_email"])) {
    // Get employee id and email
    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if user exists
    $sql = "SELECT * FROM users WHERE emp_id = '$emp_id' AND email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Store the security question in session to use later
        session_start();
        $_SESSION['emp_id'] = $emp_id;
        $_SESSION['security_question'] = $user['security_question'];

        // Redirect to the security question page
        header("Location: reset_password.php");
        exit();
    } else {
        echo "<script>alert('No account found with this Employee ID and Email'); window.location.href = 'forgot_password.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Forgot Password</title>
    <style>
         .login_form {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }
#emp_id{
    width: 100%;
    height: 35px;
    outline:none;
    border-radius: 2px;
    border:1px light gray;
    outline:0;
     font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
}
#emp_id::placeholder{
    padding-left:5px;
}
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-submit {
            background-color: #4CAF50;
        }

        .btn-reset {
            background-color: #f44336;
        }

        .btn:hover {
            opacity: 0.9;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
        </style>
</head>
<body>
<header>
        <div class="header-content">
            <img src="images/telangana_logo.png" alt="telangana_logo" class="logo">
            <h1>Peddapalli District Collectorate</h1>
        </div>
        <div class="header-right">
            <div class="cmTxt">
                <div class="kcrTxt">Sri A. Revanth Reddy</div> 
                <div class="tsTxt">Hon'ble Chief Minister</div> 
            </div>
            <div class="cmThumb">
                <img src="images/cm.png" alt="cm sir pic">
            </div>
            <div class="cmTxt">
                <div class="kcrTxt">Sri D.Sridhar Babu</div> 
                <div class="tsTxt">Hon'ble Minister for IT</div> 
            </div>
            <div class="cmThumb">
                <img src="images/it.png" alt="75th Azadi Ka Amrit Mahotsav">
            </div>
        </div>
    </header>

    <div class="navbar">
        <a href="main.html">Home</a>
        <div class="dropdown">
            <button class="dropbtn">About us  <img src="images/down.gif" class="downarrowclass" style="border:0;">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">History</a>
              <a href="#">Collector Profile</a>
              <a href="#">Previous Collector Details</a>
              <a href="#">Buildings</a>
              <a href="#">Administrative details</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">About district   <img src="images/down.gif" class="downarrowclass" style="border:0;">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">History</a>
              <a href="#">Map of District</a>
              <a href="#">Demography</a>
              <a href="#">Mandals and Pincodes</a>
              <a href="#">Public Utilities</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Media Gallery   <img src="images/down.gif" class="downarrowclass" style="border:0;">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Video Gallery</a>
              <a href="#">Photo Gallery</a>
              <a href="#"> Events</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Services   <img src="images/down.gif" class="downarrowclass" style="border:0;">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Service 1</a>
              <a href="#">Service 2</a>
              <a href="#">Service 3</a>
              <a href="#">Service 4</a>
              <a href="#">Service 5</a>
            </div>
        </div>
        <a href="noti.html">Notifications</a>
        <a href="login.html">Login</a>
        <div class="dropdown">
            <button class="dropbtn">Grievances   <img src="images/down.gif" class="downarrowclass" style="border:0;">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">People Support</a>
              <a href="#">Feedback</a>
            </div>
        </div>
        <a  class="contact-info" href="contact.html">Contact</a>
    </div>
    <div class="login_form">
    <div class="login-container">
    <h2>Forgot Password</h2>
    <br>
    
    <form action="forgot_password.php" method="POST">
        <div class="form-group">
        <label for="emp_id">Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <div class="btn-group">
<button type="submit" class="btn btn-submit" name="submit_emp_email">Submit</button>
        </div>
    </form>
    </div>
    </div></div>
</body>
</html>
