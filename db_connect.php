<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "csa";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Folder path containing the images
$folder_path = __DIR__ . "/uploads";

// Iterate over files in the folder
foreach (new DirectoryIterator($folder_path) as $fileInfo) {
    if($fileInfo->isDot()) continue; // Skip . and ..

    $filename = $fileInfo->getFilename();
    $file_path = $fileInfo->getPathname();

    // Check if file already exists in the database
    $sql_check = "SELECT COUNT(*) AS count FROM Uploads WHERE file_name = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $filename);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $row = $result_check->fetch_assoc();
    $count = $row['count'];
    $stmt_check->close();

    // If the file already exists, skip uploading
    if ($count > 0) {
        continue;
    }

    // Read the image content
    $image_content = file_get_contents($file_path);

    // Insert information into the database
    $sql = "INSERT INTO Uploads (file_name, image) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $filename, $image_content);
    $stmt->send_long_data(1, $image_content); // Send the image content as long data
    $stmt->execute();
}

// Close connection
?>
