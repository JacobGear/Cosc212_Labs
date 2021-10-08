<?php
session_start();
$filename = $_POST['xmlFileName'];
$score = $_POST['makeReview'];
$reviews = simplexml_load_file($filename);
$review = $reviews->addChild('review');
$review->addChild('user', $_SESSION['authenticatedUser']);
$review->addChild('rating', $score);
$reviews->saveXML($filename);
if(isset($_SESSION['lastPage'])) {
    header("Location:" . $_SESSION['lastPage']);
} else {
    header("Location: index.php");
}