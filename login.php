<?php
session_start();
// Database connection
$conn = mysqli_connect("localhost", "root", "root", "login_database", 3300);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["login"])) {
    // Get form data and sanitize inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $emp_id = $_POST['emp_id'];
    $role = $_POST['role'];  // Retrieved role from form

    // SQL Query to check the user
    $sql = "SELECT * FROM users WHERE email = '$username' AND emp_id = '$emp_id' AND role = '$role'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['password'];
        $db_role = $row['role'];

        // Verify password and role
        if ($password === $db_password) {
            $_SESSION['logged_in'] = true;    // Set session flag for logged in users
            $_SESSION['emp_id'] = $emp_id;    // Store employee ID in session
            $_SESSION['role'] = $db_role;     // Store the user role in session

            // Redirect based on the user's role
            if (strtolower($db_role) == 'collector' && strtolower($role) == 'collector') {
                header("Location: collector/dashboard.php");
                exit();
            } elseif (strtolower($db_role) == 'administrative_officer' && strtolower($role) == 'administrative_officer') {
                header("Location: administrative_department/admin_dashboard.php");
                exit();
            } elseif (strtolower($db_role) == 'hod' && strtolower($role) == 'hod') {
                header("Location: hod/enter_attendance.php");
                exit();
            } else {
                header("Location: employee/employee_attendance.php");
                exit();
            }
        } else {
            echo "<script>alert('Login Unsuccessful. Incorrect password.'); window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('Login Unsuccessful. User not found or invalid employee ID.'); window.location.href = 'login.html';</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
