<?php
session_start();

$host = 'localhost';
$db = 'masjid_digital_library';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM admins WHERE username='$username' OR email='$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Username or Email already exists!');
                window.location.href = 'register.php';
            </script>";
    } else {
        // Insert into database
        $insertQuery = "INSERT INTO admins (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>
                    alert('Registration successful! Please proceed to login.');
                    window.location.href = 'login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error: " . $conn->error . "');
                    window.location.href = 'register.php';
            </script>";
        }
    }
}

// Check if cookies are set
if (isset($_COOKIE['username']) && isset($_COOKIE['user_id'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['user_id'] = $_COOKIE['user_id'];
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn->close();
?>