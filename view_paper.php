<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'db_connect.php';
require_once 'fetch_upload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="view_paper.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>

    <!--Header of webpage-->
    <header>
        <picture class="logo">
            <?php
            $imageData = displayImage('full_logo.png', $conn); // Get the image data
            if ($imageData) {
                // If image data is available, create the base64 encoded image source
                $imageSource = 'data:image/png;base64,' . $imageData;
                // Output the image tag with the source set to the base64 encoded image data
                echo '<img src="' . $imageSource . '" style="width:auto;" />';
            } else {
                // Handle case where image data is not available
                echo 'Image not found';
            }
            ?>
        </picture>

        <section class="search">
            <input type="search" placeholder="Search" id="search_bar" style="padding-left:40px;"/>
        </section>
    </header>

    <!--Path Menu-->
    <section class="path">
        <h1 id="home" data-link="index.php">Home</h1> <h1>></h1>
        <h1 id="program">Computer Science</h1> <h1>></h1>
        <h1 id="year">2024</h1>
    </section>
    <br>

    <!--Buttons-->
    <section class="borrow">
        <h2 class="program">CS</h2>
        <h2 class="borrowBtn" data-link="">Borrow Paper</h2>
    </section>

    <section class="preview">
        <h1 class="title">Title na Napakahaba Siguro</h1>

        <section class="properties">
            <h2>Published on: </h2>
            <h2 class="date">October 31, 2022</h2>
            <h2 class="section">BSCS-NS-3AB-M</h2>
        </section>

        <section class="authors">
            <h1>Authors:</h1>
            <h2 class="proponent">Aduviso, Arabella Mae</h2>
            <h2 class="proponent">Caducio, Luis Pocholo</h2>
            <h2 class="proponent">Caturla, Simone Arabella</h2>
            <h2 class="proponent">Florendo, Adrian</h2>
            <h2 class="proponent">Rosete, Alexander</h2>

            <hr class="divide">
        </section>

        <section class="text">
            <h1>Abstract</h1>
            <p class="abstract">Proin facilisis elit risus, id placerat nibh sagittis sed. Nullam aliquam leo quis faucibus dapibus. Cras diam sem, scelerisque nec faucibus non, faucibus quis nibh. Duis turpis nisl, pulvinar eget fringilla quis, ultricies id odio. Ut placerat laoreet dui, vel rutrum purus eleifend vel. In congue blandit nibh ac viverra. Cras vestibulum lacus sit amet viverra efficitur. Nunc mattis, urna ac vestibulum ultrices, nisl sapien sollicitudin metus, in vehicula arcu velit vitae turpis. Aliquam non dui lorem. Maecenas ultrices porta lorem eu vestibulum. Vestibulum vestibulum ut eros condimentum condimentum. Praesent pellentesque aliquet facilisis. Vestibulum accumsan eros a accumsan elementum. Ut nec lobortis augue, tincidunt posuere ligula. Vestibulum massa nibh, lobortis id eros non, pellentesque lobortis turpis.</p>

        </section>
    </section>

    <script>
        $('picture.logo').on('click', function(e){
            e.preventDefault();
            window.location.href=$(this).data('link');
        })

        $('#home').on('click', function(e){
            e.preventDefault();
            window.location.href=$(this).data('link');
        })

        $('.borderBtn').on('click', function(e){
            e.preventDefault();
            window.location.href=$(this).data('link');
        })
    </script>
    
</body>
</html>