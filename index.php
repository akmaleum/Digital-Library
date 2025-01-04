<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Al-A'la Digital Library</title>
    <link rel="icon" href="images/icon.png" type="image/png">
    <link rel="stylesheet" href="css/index.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h2>ِبِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيْم</h2>
        <h3>Laman Utama</h3>
        <nav>
            <ul>
                <li><a href="index.php">Laman Utama</a></li>
                <li><a href="archive.php">Bahan Bacaan</a></li>
                <li><a href="analytics.php">Analisis</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="contact.php">Hubungi Kami</a></li>
            </ul>
            <?php
            session_start();
            ?>

            <div class="admin-button-container">
                <a
                    href="<?php echo isset($_SESSION['user_id']) ? 'success.php' : 'login.php'; ?>"
                    class="admin-button">
                    Admin
                </a>
            </div>
        </nav>
    </header>

    <main>
        <h3>Perpustakaan Digital Masjid Al-A'la</h3>
        <p>Pintu utama anda ke sumber pengajian Islam, termasuk buku dan video.</p>
    </main>

    <footer>
        <img src="images/icon.png" alt="Library Icon" class="footer-icon">
        <p>&copy; 2024 Perpustakaan Digital Masjid Al-A'la</p>
    </footer>
</body>

</html>