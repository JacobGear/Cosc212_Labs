<?php
if (!isset($_GET['user'])) {
    header("Location: helloForm.html");
    exit;
}
?>

<html>
<body>

Welcome
<?php
    echo htmlentities($_GET["user"]);
?>

</body>
</html>