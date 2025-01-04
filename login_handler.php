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
    $password = $_POST['password'];

    // Fetch user from database
    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Check if "Remember Me" is checked
        if (isset($_POST['remember'])) {
            // Set a cookie for 30 days
            setcookie('username', $user['username'], time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
        }
            
            // Redirect to success page
            header("Location: success.php");
            exit();
        } else {
            echo "<script>
                    alert('Invalid password!');
                    window.location.href = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('User not found!');
                window.location.href = 'login.php';
            </script>";
    }
}

$conn->close();
?>