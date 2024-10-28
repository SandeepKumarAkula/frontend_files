<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "root", "login_database", 3300);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve and sanitize form data
    $empID = mysqli_real_escape_string($conn, $_POST['empID']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $security_question = mysqli_real_escape_string($conn, $_POST['security_question']);
    $security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);
    
    

    // Insert user data into the `pending_users` table
    $sql = "INSERT INTO pending_users (emp_id, name, dob, email, phone, gender,department, role, password, security_question, security_answer, status) 
            VALUES ('$empID', '$name', '$dob', '$email', '$phone', '$gender',' $department','$role', '$password', '$security_question', '$security_answer', 'pending')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration Successful! Awaiting admin approval.'); window.location.href = 'login.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registration Page</title>
    <style>
        /* Container for form */
.login_form {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 170vh; /* Full height for better alignment */
    margin: 0;
}

.register-container {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 400px; /* Wider form for better usability */
}

/* Header */
h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Form group styling */
.form-group {
    margin-bottom: 20px;
}

label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 8px; /* Increased spacing for readability */
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="tel"],
select {
    width: 100%;
    padding: 12px; /* More padding for inputs */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
}

/* Focus state for inputs */
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="tel"]:focus,
select:focus {
    border-color: #4CAF50;
    outline: none;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.4); /* Light green glow */
}

/* Gender radio button styling */
.gender-group {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
}

.gender-group label {
    margin-right: 10px;
}

/* Button group */
.btn-group {
    display: flex;
    justify-content: space-between;
}

.btn {
    width: 48%;
    padding: 12px; /* More padding for better look */
    border: none;
    border-radius: 4px;
    font-size: 14px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth transition on hover */
}

.btn-submit {
    background-color: #4CAF50;
}

.btn-reset {
    background-color: #f44336;
}

/* Button hover effect */
.btn:hover {
    opacity: 0.8;
}

/* Register link */
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
        <div class="register-container">
            <h2>Registration</h2>
            <br>
            <form method="POST" action="register.php" onsubmit="return validateForm()">
                <!-- Other fields like Employee ID, Name, DOB, etc. remain the same -->
                <div class="form-group">
                    <label for="empID">Employee ID:</label>
                    <input type="text" id="empID" name="empID" placeholder="Enter Employee ID" required>
                </div>

                <div class="form-group">
                    <label for="name">Employee Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" pattern="[0-9]{10}" required>
                </div>

                <div class="form-group gender-group">
                    <label>Gender:</label>
                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                    <label><input type="radio" name="gender" value="Female" required> Female</label>
                    <label><input type="radio" name="gender" value="Other" required> Other</label>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
        <select id="department" name="department" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="collector">Collector</option>
                        <option value="administrative_officer">Administrative Department</option>
                        
                        <option value="dharani">Dharani</option>
                        <option value="it_department">IT Department</option>
                        <option value="finance">Finance Department</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Designation:</label>
        <select id="role" name="role" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="collector">Collector</option>
                        <option value="administrative_officer">Administrative Officer</option>
                        
                        <option value="hod">HOD</option>
                        <option value="it_department">IT Department</option>
                        <option value="employee">Employee</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Create Password:</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Re-enter Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your password" required>
                </div>

                <!-- Security Question -->
                <div class="form-group">
                    <label for="security_question">Security Question:</label>
                    <select id="security_question" name="security_question" required>
                        <option value="" disabled selected>Select a security question</option>
                        <option value="What was the name of your first pet?">What was the name of your first pet?</option>
                        <option value="What was the make of your first car?">What was the make of your first car?</option>
                        <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                        <option value="What was the name of your elementary school?">What was the name of your elementary school?</option>
                    </select>
                </div>

                <!-- Security Answer -->
                <div class="form-group">
                    <label for="security_answer">Answer to Security Question:</label>
                    <input type="text" id="security_answer" name="security_answer" placeholder="Enter your answer" required>
                </div>

                <!-- Password fields and the rest of the form remain the same -->
                <div class="btn-group">
                    <button type="reset" class="btn btn-reset">Reset</button>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
