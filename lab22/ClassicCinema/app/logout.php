<?php
session_start();
unset($_SESSION['authenticatedUser']);
unset($_SESSION['role']);
if(isset($_SESSION['lastPage'])) {
    header("Location:" . $_SESSION['lastPage']);
} else {
    header("Location: index.php");
}