<!DOCTYPE html>

<html lang="en">

<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <?php
    $scriptList = array('javascript/jquery-3.6.0-un.js', 'javascript/showHide.js',
        'javascript/ArrLists.js');
    include("app/includeScripts.php");
    ?>
</head>

<body>

<?php
$currentPage = basename($_SERVER['PHP_SELF']);
include("app/header.php");
?>

        <main>
            <p>
                Welcome to Classic Cinema, your online store for classic film.
            </p>

            <div id="arrImg"></div>

        </main>

<?php require ("app/footer.php"); ?>

    </body>
</html>