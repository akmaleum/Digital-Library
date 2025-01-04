<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/icon.png" type="image/png">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header>
        <h2>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h2>
        <h3>Admin Login</h3>
        <h1>Masjid Al-A'la Digital Library</h1>

        <a href="index.php" style="position: absolute; top: 20px; left: 40px;">
            <img src="images/icon.png" alt="Library Icon" class="footer-icon" style="width: 50px; height: auto;">
        </a>
    </header>

    <div class="form-container" id="login-form">
        <h2>Admin Login</h2>
        <form action="login_handler.php" method="POST">
            <div class="form-group">
                <label for="login-username">Username</label>
                <input type="text" id="login-username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
            </div> 
            <button type="submit">Login</button>
        </form>
        
    </div>

    <div id="success-message" style="display: none;">
        <h2 id="success-title"></h2>
        <p><a href="index.php" class="back-to-home">Back to Home</a></p>
    </div>

    <script>
        function showSuccessMessage(title) {
            document.getElementById('success-message').style.display = 'block';
            document.getElementById('success-title').innerText = title;
            document.getElementById('login-form').style.display = 'none';
        }
    </script>

    <footer>
        <img src="images/icon.png" alt="Library Icon" class="footer-icon">
        <p>&copy; 2024 Perpustakaan Digital Masjid Al-A'la</p>
    </footer>
</body>
</html>