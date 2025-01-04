<?php
session_start();  // Start the session

// Check if the user is logged in using session
if (isset($_SESSION['user_id'])) {
    // User is logged in via session
    echo "";
} elseif (isset($_COOKIE['remember_me'])) {
    // Check for 'remember_me' cookie (if you are using it for automatic login)
    $userId = $_COOKIE['remember_me'];
    
    // You can validate the cookie here (e.g., checking if the cookie is valid in the database)
    // If valid, set the session to keep the user logged in
    $_SESSION['user_id'] = $userId;  // Set session variable to remember the user
    
    echo "User logged in via cookie.";
} else {
    // User is not logged in
    echo "User is not logged in.";
    // Optionally, you can redirect the user to the login page
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="icon" href="images/icon.png" type="image/png">
    <link rel="stylesheet" href="css/admin.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        #success-message {
            margin: 20px;
            padding: 20px;
            background-color: transparent;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Use flexbox */
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Center items horizontally */
        }
        .back-to-home {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-to-home:hover {
            background-color: #0056b3;
        }

        .admin-dashboard{
            display: inline-block;
            padding: 10px 20px;
            margin-top: -5px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .admin-dashboard:hover {
            background-color: #0056b3;
        }

        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #dc3545; /* Red color for logout */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #c82333; /* Darker red on hover */
        }
    </style>
</head>

<body>
    <header>
        <h2>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h2>
        <h3>Success</h3>
        <h1>Masjid Al-A'la Digital Library</h1>
    </header>

    <div id="success-message">
        <h2>Login Successful!</h2>
        <p>
            <a href="index.php" class="back-to-home">Back to Home</a>
        </p>
        <p>
            <a href="admin_dashboard.php" class="admin-dashboard">Go to Admin Dashboard</a>
        </p>
        <p>
            <a href="logout.php" class="logout-button">Logout</a>
        </p>
    </div>

    <footer>
        <img src="images/icon.png" alt="Library Icon" class="footer-icon">
        <p>&copy; 2024 Perpustakaan Digital Masjid Al-A'la</p>
    </footer>
</body>

</html>