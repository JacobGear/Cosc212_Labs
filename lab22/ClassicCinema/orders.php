<?php
session_start();
if(!isset($_SESSION['authenticatedUser'])) {
    header("Location: loginplease.php");
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
include("app/header.php");
?>


<main>
    <?php
    if($_SESSION['role'] === 'admin') {
        echo "<h2>Orders</h2>";
    } else {
        echo "<h3>" . $_SESSION['authenticatedUser'] . " Orders:</h3>";
    }
    $orders = simplexml_load_file('xml/orders.xml');
    $numOrders = 1;
    foreach ($orders->order as $order) {
        $username = $order->delivery->username;
        $name = $order->delivery->name;
        $email = $order->delivery->email;
        $address = $order->delivery->address;
        $city = $order->delivery->city;
        $postcode = $order->delivery->postcode;
        if($_SESSION['role'] === 'admin') {
            echo "<h3>Order $numOrders</h3>";
            echo "</p><strong>Username:</strong> $username<p>";
            echo "</p><strong>Name:</strong> $name<p>";
            echo "</p><strong>Email:</strong> $email<p>";
            echo "</p><strong>Address:</strong> $address<p>";
            echo "</p><strong>City:</strong> $city<p>";
            echo "</p><strong>Postcode:</strong> $postcode<p>";
            $items = $orders->items;
            echo "$items";
            echo "</p><strong>Items: </strong>";
            foreach ($items as $item) {
                echo "$item->title $$item->price; ";
            }
            echo "<p><br>";
            $numOrders++;
        } else {
            if($username == $_SESSION['authenticatedUser']){
                echo "</p><strong>Name:</strong> $name<p>";
                echo "</p><strong>Email:</strong> $email<p>";
                echo "</p><strong>Address:</strong> $address<p>";
                echo "</p><strong>City:</strong> $city<p>";
                echo "</p><strong>Postcode:</strong> $postcode<p>";
                $items = $orders->items;
                echo "$items";
                echo "</p><strong>Items: </strong>";
                foreach ($items as $item) {
                    echo "$item->title $$item->price; ";
                }
                echo "<p><br>";
            }
        }
    }
    ?>
</main>


<?php require ("app/footer.php"); ?>

</body>
</html>