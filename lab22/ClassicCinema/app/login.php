<?php
session_start();
$conn = new mysqli('sapphire', 'jgear', 'Vc36937475',
    'jgear_dev');
if ($conn->connect_errno) {
// Something went wrong connecting
    printf('Connection error: ' . mysqli_connect_error());
} else {
    printf("Connection successful <br>");
}

$username =  $conn->real_escape_string($_POST["loginUser"]);
$password =  $conn->real_escape_string($_POST["loginPassword"]);

$_SESSION['authenticatedUser'] = $username;

$query = "SELECT * FROM Users WHERE username = '$username'";
$result = $conn->query($query);
if ($result->num_rows === 0) {
// OK, there is no user with that username
    echo "Username does not exist!";
} else {
// Sign the user in
    $row = $result->fetch_assoc();
    if(sha1($password) === $row['password']) {
        echo "Success";
        echo $_SESSION['lastPage'];
        if(isset($_SESSION['lastPage'])) {
            header("Location:" . $_SESSION['lastPage']);
        } else {
            header("Location: index.php");
        }

    }
}
$result->free();
$conn->close();