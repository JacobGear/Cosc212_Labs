<?php
$counter = 1;
if (isset($_COOKIE['counter'])) {
    $counter = (int) $_COOKIE['counter'];
}
setcookie('counter', $counter+1, time()+3600, '/');
echo "<p> You have been here $counter time(s) recently</p>";
?>
<html>
<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/style.css">

</head>
</html>