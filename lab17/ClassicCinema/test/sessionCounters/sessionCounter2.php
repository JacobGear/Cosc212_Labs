<?php
session_start();
if (isset($_SESSION['counter2'])) {
    $_SESSION['counter2'] += 1;
} else {
    $_SESSION['counter2'] = 1;
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>PHP Sessions 1</title>
    <meta charset="utf-8">
</head>

<body>

<h1>Page 2</h1>

<ul>
    <li><a href="sessionCounter1.php">Page 1</a> has been accessed <?php
        if (isset($_SESSION['counter1'])) {
            echo $_SESSION['counter1'];
        } else {
            echo "0";
        }
        ?> times
    <li>Page 2 has been accessed <?php
        if (isset($_SESSION['counter2'])) {
            echo $_SESSION['counter2'];
        } else {
            echo "0";
        }
        ?> times
    <li><a href="sessionCounter3.php">Page 3</a> has been accessed <?php
        if (isset($_SESSION['counter3'])) {
            echo $_SESSION['counter3'];
        } else {
            echo "0";
        }
        ?> times
</ul>

</body>

</html>