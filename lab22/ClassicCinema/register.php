<?php
session_start();
if(isset($_SESSION['authenticatedUser'])) {
    header("Location: index.php");
}
?>

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
?>
<header>
    <h1>Classic Cinema</h1>
    <nav>
        <ul>
            <?php
            if (isset($currentPage) && $currentPage === 'index.php') {
                echo "<li> Home";
            } else {
                echo "<li> <a href='index.php'>Home</a>";
            }
            if (isset($currentPage) && $currentPage === 'classic.php') {
                echo "<li> Classic";
            } else {
                echo "<li> <a href='classic.php'>Classic</a>";
            }
            if (isset($currentPage) && $currentPage === 'hitchcock.php') {
                echo "<li> Hitchcock";
            } else {
                echo "<li> <a href='hitchcock.php'>Hitchcock</a>";
            }
            if (isset($currentPage) && $currentPage === 'scifi.php') {
                echo "<li> Sci-Fi";
            } else {
                echo "<li> <a href='scifi.php'>Sci-Fi</a>";
            }
            if (isset($currentPage) && $currentPage === 'contact.php') {
                echo "<li> Contact";
            } else {
                echo "<li> <a href='contact.php'>Contact</a>";
            }
            if (isset($currentPage) && $currentPage === 'cart.php') {
                echo "<li> Cart";
            } else {
                echo "<li> <a href='cart.php'>Cart</a>";
            }
            ?>
        </ul>
    </nav>
</header>

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