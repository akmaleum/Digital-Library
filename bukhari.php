<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahih Bukhari</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/icon.png" type="image/png">
    <link rel="stylesheet" href="css/hadith-styles.css">

</head>
<body>
    <?php
    // Include the display_content.php file at the top
    require_once('display-content.php');
    ?>

    <header>
        <h2>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h2>
        <h1>Sahih Bukhari</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="bukhari.php">Sahih Bukhari</a></li>
                <li><a href="muslim.php">Sahih Muslim</a></l>
                <li><a href="umum.php">Bacaan Umum</a></li>
                <li><a href="kanak_kanak.php">Bacaan Kanak-Kanak</a></li>
                <li><a href="video_ceramah.php">Video Ceramah</a></li>
                </ul>
            </nav>
        </nav>
    </header>

    <main class="content-container">
        <?php
        // Call the getContent function with the appropriate category
        echo getContent('bukhari');
        ?>
    </main>

    <footer>
        <img src="images/icon.png" alt="Library Icon" class="footer-icon">
        <p>&copy; 2024 Perpustakaan Digital Masjid Al-A'la</p>
    </footer>
</body>
</html>