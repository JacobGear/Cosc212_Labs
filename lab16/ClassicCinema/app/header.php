<header>
    <h1>Classic Cinema</h1>
    <div id="user">
        <div id="login">
            <form id="loginForm">
                <label for="loginUser">Username: </label>
                <input type="text" name="loginUser" id="loginUser"><br>
                <label for="loginPassword">Password: </label>
                <input type="password" name="loginPassword" id="loginPassword"><br>
                <input type="submit" id="loginSubmit" value="Login">
            </form>
        </div>

        <div id="logout">
            <p>Welcome, <span id="logoutUser"></span></p>
            <form id="logoutForm">
                <input type="submit" id="logoutSubmit" value="Logout">
            </form>
        </div>
    </div>

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
