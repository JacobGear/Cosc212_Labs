<!DOCTYPE html>

<html lang="en">

<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <?php
    $scriptList = array('javascript/jquery-3.6.0-un.js', 'javascript/register.js');
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
        You are not logged in, try logging in at the top left of the page!
    </p>
</main>

<?php require ("app/footer.php"); ?>

</body>
</html>