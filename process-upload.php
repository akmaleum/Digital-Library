<?php
// process-upload.php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$db = 'masjid_digital_library';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['description']);
    
    // File handling
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    
    // Get file extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    // Allowed file types
    $allowed = array('pdf', 'jpg', 'jpeg', 'png', 'mp4', 'avi', 'mkv');
    
    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            // Set file size limit (50MB)
            if ($fileSize < 50000000) {
                // Create unique filename
                $fileNameNew = uniqid('', true) . "." . $fileExt;
                
                // Create category directory if it doesn't exist
                $uploadDir = "uploads/" . $category . "/";
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $fileDestination = $uploadDir . $fileNameNew;
                
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    // Insert into database
                    $query = "INSERT INTO library_content (title, category, description, file_name, file_type, file_path, file_size, mime_type) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssssssss", $title, $category, $description, $fileNameNew, $fileExt, $fileDestination, $fileSize, $fileType);
                    
                    if ($stmt->execute()) {
                        echo "<script>
                                alert('Upload successful!');
                                window.location.href = 'admin_dashboard.php';
                              </script>";
                    } else {
                        echo "<script>
                                alert('Database error: " . $conn->error . "');
                                window.location.href = 'admin_dashboard.php';
                              </script>";
                    }
                } else {
                    echo "<script>
                            alert('Error moving uploaded file!');
                            window.location.href = 'admin_dashboard.php';
                          </script>";
                }
            } else {
                echo "<script>
                        alert('File is too large! Maximum size is 50MB.');
                        window.location.href = 'admin_dashboard.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Error uploading file!');
                    window.location.href = 'admin_dashboard.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid file type! Allowed types: PDF, JPG, JPEG, PNG, MP4, AVI, MKV');
                window.location.href = 'admin_dashboard.php';
              </script>";
    }
}

$conn->close();
?>