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
    <h2>Orders</h2>
    <?php
    $orders = simplexml_load_file('xml/orders.xml');
    $numOrders = 1;
    foreach ($orders->order as $order) {
        echo "<h3>Order $numOrders</h3>";
        $name = $order->delivery->name;
        $email = $order->delivery->email;
        $address = $order->delivery->address;
        $city = $order->delivery->city;
        $postcode = $order->delivery->postcode;
        echo "</p><strong>Name:</strong> $name<p>";
        echo "</p><strong>Email:</strong> $email<p>";
        echo "</p><strong>Address:</strong> $address<p>";
        echo "</p><strong>City:</strong> $city<p>";
        echo "</p><strong>Postcode:</strong> $postcode<p>";
        $items = $orders->xpath('//item');
        echo "</p><strong>Items: </strong>";
        foreach ($items as $item) {
            echo "$item->title $$item->price; ";
        }
        echo "<p>";
        echo "<br>";
        $numOrders++;
    }
    ?>
</main>


<?php require ("app/footer.php"); ?>

</body>
</html>