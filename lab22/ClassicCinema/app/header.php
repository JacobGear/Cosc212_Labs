<?php
session_start();
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>
<header>
    <h1>Classic Cinema</h1>
    <div id="user">
        <?php if (isset($_SESSION['authenticatedUser'])) { ?>
        <div id="logout">
            <p>Welcome, <?php echo $_SESSION['authenticatedUser'] . " " . $_SESSION['role']; ?>
                <span id="logoutUser"></span></p>
            <form id="logoutForm" action="app/logout.php" method="post">
                <input type="submit" id="logoutSubmit" value="Logout">
            </form>
        </div>
        <?php } else { ?>
        <div id="login">
            <form id="loginForm" action="app/login.php" method="post">
                <label for="loginUser">Username: </label>
                <input type="text" name="loginUser" id="loginUser"><br>
                <label for="loginPassword">Password: </label>
                <input type="password" name="loginPassword" id="loginPassword"><br>
                <input type="submit" id="loginSubmit" value="Login">
            </form>
            <input type="button" id="regBtn" value="Register">
        </div>
    </div>
    <?php } ?>
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
            if (isset($currentPage) && $currentPage === 'orders.php') {
                echo "<li> Orders";
            } else {
                echo "<li> <a href='orders.php'>Orders</a>";
            }
            ?>

        </ul>


    </nav>
</header>
