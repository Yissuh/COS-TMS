<?php
// image_functions.php

function displayImage($fileName, $conn) {
    // Fetch the image from the database
    $sql = "SELECT image FROM uploads WHERE file_name = '$fileName'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch the image data
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['image'];

        // Convert the image data to base64 encoding
        $base64Image = base64_encode($imageData);

        // Return the base64 encoded image data
        return $base64Image;
    }

    // Return null if image retrieval fails
    return null;
}
?>
