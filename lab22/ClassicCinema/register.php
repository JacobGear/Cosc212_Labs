<!DOCTYPE html>

<html lang="en">

<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <?php
    $scriptList = array('javascript/jquery-3.6.0-un.js');
    include("app/includeScripts.php");
    ?>
</head>

<body>

<?php
$currentPage = basename($_SERVER['PHP_SELF']);
include("app/header.php");
?>


<main>
    <h2>Register Here.</h2>

    <form id="regForm" action="app/checkUsername.php" method="post">
        <label for="regUsername">Username: </label>
        <input type="text" name="regUsername" id="regUsername"><br>
        <label for="regEmail">Email: </label>
        <input type="text" name="regEmail" id="regEmail"><br>
        <label for="regPassword">Password: </label>
        <input type="password" name="regPassword" id="regPassword"><br>
        <label for="confPassword">Confirm Password: </label>
        <input type="password" name="confPassword" id="confPassword"><br>
        <input type="submit" id="regSubmit" value="Register">
    </form>


</main>

<?php require ("app/footer.php"); ?>

</body>
</html>