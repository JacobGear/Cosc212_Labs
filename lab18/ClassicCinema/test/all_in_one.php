<?php

$formOK = false;

if( isset($_GET['user']) && (strlen(trim($_GET['user']))> 0) ) {
    $formOK = true;
    echo htmlentities($_GET["user"]);
}

if (!$formOK) { ?>
    <html lang="en">
    <body>
    <form action="processHello.php" method="get">
        <label for="user">Name: </label>
        <input type="text" name="user" id="user"><br>
        <input type="submit" id="loginSubmit" value="Submit">
    </form>
    </body>
    </html>
<?php } ?>