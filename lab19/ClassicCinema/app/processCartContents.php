<?php
session_start();

$arr = json_decode(file_get_contents("php://input"));
echo "<h2>Completed purchase:</h2>";
echo "<table>";
foreach ($arr as $value){
    echo "<th> Title: </th>";
    echo "<td>" . $value->title . "</td>";
    echo "<th> Price: </th>";
    echo "<td>" . $value->price . "</td>";
}
echo "</table>";

$orders = simplexml_load_file('../xml/orders.xml');
$newOrder = $orders->addChild('order');
$delivery = $newOrder->addChild('delivery');
$delivery->addChild('name', $_SESSION['deliveryName']);
$delivery->addChild('email', $_SESSION['deliveryEmail']);
$delivery->addChild('address', $_SESSION['deliveryAddress1']);
$delivery->addChild('city', $_SESSION['deliveryCity']);
$delivery->addChild('postcode', $_SESSION['deliveryPostcode']);
$items = $newOrder->addChild('items');
foreach ($arr as $value){
    $item = $items->addChild('item');
    $item->addChild('title', $value->title);
    $item->addChild('price', $value->price);
}

$orders->saveXML('../xml/orders.xml');
