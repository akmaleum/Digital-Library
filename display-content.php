<?php
function getContent($category) {
    $host = 'localhost';
    $db = 'masjid_digital_library';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM library_content WHERE category = ? ORDER BY upload_date DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    $content = ""; // Remove the content-container div from here

    while ($row = $result->fetch_assoc()) {
        $content .= '<div class="content-item">';
        $content .= '<h3>' . htmlspecialchars($row['title']) . '</h3>';
        $content .= '<p>' . htmlspecialchars($row['description']) . '</p>';

        // Display content based on file type
        $fileType = strtolower(pathinfo($row['file_name'], PATHINFO_EXTENSION));

        switch($fileType) {
            case 'pdf':
                $content .= '<a href="' . htmlspecialchars($row['file_path']) . '" target="_blank">View PDF</a>';
                break;

            case 'jpg':
            case 'jpeg':
            case 'png':
                $content .= '<img src="' . htmlspecialchars($row['file_path']) . '" alt="' . htmlspecialchars($row['title']) . '" style="width: 100%;">';
                break;

            case 'mp4':
            case 'avi':
            case 'mkv':
                $content .= '<video width="100%" controls>';
                $content .= '<source src="' . htmlspecialchars($row['file_path']) . '" type="video/' . $fileType . '">';
                $content .= 'Your browser does not support the video tag.';
                $content .= '</video>';
                break;
        }

        $content .= '<div class="content-meta">';
        $content .= '</div>';
        $content .= '</div>';
    }
    
    $conn->close();
    return $content;
}
?>