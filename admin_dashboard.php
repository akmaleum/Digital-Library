<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/icon.png" type="image/png">
    <link rel="stylesheet" href="css/admin_dashboard.css?v=1.0">
</head>
<body>
<header>
        <div class="header-title">
        <a href="index.php">
        <img src="images/icon.png" alt="Library Logo" class="header-logo">
    </a>
    <h1>Admin Dashboard</h1>
        </div>
        <nav>
            <ul>
                <li><a href="archive.php">View Archive</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="upload-section">
            <h2>Upload New Content</h2>
            <form action="process-upload.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
        
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="bukhari">Sahih Bukhari</option>
                        <option value="muslim">Sahih Muslim</option>
                        <option value="umum">Bacaan Umum</option>
                        <option value="kanak_kanak">Bacaan Kanak-Kanak</option>
                        <option value="video_ceramah">Video Ceramah</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>
        
                <div class="form-group">
                    <label for="file">File (PDF or Image)</label>
                    <input type="file" id="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.mp4,.avi,.mkv" required>
                </div>
        
                <button type="submit">Upload Content</button>
            </form>
        </section>
    </main>

    <footer>
        <a href="index.php">
            <img src="images/icon.png" alt="Library Icon" class="footer-icon">
        </a>
        <p>&copy; 2024 2024 Perpustakaan Digital Masjid Al-A'la</p>
    </footer>
</body>
</html>