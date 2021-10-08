<!DOCTYPE html>

<html lang="en">

<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/leaflet.css">
    <?php
    $scriptList = array('javascript/jquery-3.6.0-un.js', 'javascript/showHide.js',
        'javascript/leaflet.js', 'javascript/leaflet-src.js', 'javascript/leaflet-src.esm.js',
        'javascript/map.js', 'javascript/register.js');
    include("app/includeScripts.php");
    ?>

</head>

<body>

<?php
$currentPage = basename($_SERVER['PHP_SELF']);
include("app/header.php");
?>

<main>
    <div id="map">
    </div>

    <ul class="contact">
        <li>
            <h3>Central</h3>
            <p>
                101 The Octagon
            </p>
            <p>
                (03) 490 1234
            </p>
        </li>
        <li>
            <h3>North</h3>
            <p>
                789 Princes St
            </p>
            <p>
                (03) 490 2468
            </p>
        </li>
        <li>
            <h3>South</h3>
            <p>
                561 Great King St
            </p>
            <p>
                (03) 490 3579
            </p>
        </li>
    </ul>
</main>

<?php require ("app/footer.php"); ?>

</body>
</html>