<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Masjid Al-A'la Digital Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/icon.png" type="image/png">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header>
        <h2>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h2>
        <h3>Admin Registration</h3>
        <h1>Masjid Al-A'la Digital Library</h1>

        <a href="index.php" style="position: absolute; top: 20px; left: 40px;">
            <img src="images/icon.png" alt="Library Icon" class="footer-icon" style="width: 50px; height: auto;">
        </a>
    </header>

    <div class="form-container" id="register-form">
        <h2>Admin Registration</h2>
        <form action="register_handler.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already an Admin? <a href="login.php" style="text-decoration: none;">Login here</a></p>
    </div>

    <div id="success-message" style="display: none;">
        <h2 id="success-title"></h2>
        <p><a href="index.php" class="back-to-home">Back to Home</a></p>
    </div>

    <script>
        function showSuccessMessage(title) {
            document.getElementById('success-message').style.display = 'block';
            document.getElementById('success-title').innerText = title;
            document.getElementById('register-form').style.display = 'none';
        }
    </script>

    <footer>
        <img src="images/icon.png" alt="Library Icon" class="footer-icon">
        <p>&copy; 2024 Perpustakaan Digital Masjid Al-A'la</p>
    </footer>
</body>
</html>
