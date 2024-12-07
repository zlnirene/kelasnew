<?php 
require_once("content.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img {
            width: 300px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>ini adalah header</h1>
        <li><a href="?pages">Home</a></li>
        <?php 
            foreach ($pages as $key => $value) { /*membuat menu*/
        ?>
            <li><a href="?page=<?= $value?>"><?= $key?></a></li>
        <?php
            }
        ?>
    </div>
    <div class="content">
        <h1>ini adalah content</h1>
        <?php
            if (isset($_GET["page"])){
                $page = $_GET["page"];
                if ($page == "contact"){
                    require_once('pages/contact.php');
                }
                if ($page == "jurusan"){
                    require_once("pages/jurusan.php");
                }
                if ($page == "sejarah"){
                    require_once("pages/sejarah.php");
                }
                if ($page == "prestasi"){
                    require_once("pages/prestasi.php");
                }
            } else {
                echo "ini adalah home";
            }
        ?>
    </div>
    <div class="footer">
        <h1>ini adalah footer</h1>
    </div>

    <!-- <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="jurusan.php">Jurusan</a></li>
        <li><a href="sejarah.php">Sejarah</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul> -->
    <?php 
        foreach ($gambars as $key) {
    ?>
        <!-- <img src="images/1.jpg" alt="" srcset=""> -->
        <img src="images/<?=$key;?>" alt="" srcset="">
    <?php
        }
    ?>

</body>
</html>