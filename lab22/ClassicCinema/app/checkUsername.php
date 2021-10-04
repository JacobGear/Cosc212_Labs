<?php
$conn = new mysqli('sapphire', 'jgear', 'Vc36937475',
    'jgear_dev');
if ($conn->connect_errno) {
// Something went wrong connecting
    printf('Connection error: ' . mysqli_connect_error());
} else {
    printf("Connection successful <br>");
}

$username =  $conn->real_escape_string($_POST["regUsername"]);
$email =  $conn->real_escape_string($_POST["regEmail"]);
$password =  $conn->real_escape_string($_POST["regPassword"]);
$confPassword =  $conn->real_escape_string($_POST["confPassword"]);

$query = "SELECT * FROM Users WHERE username = '$username'";
$result = $conn->query($query);
if ($result->num_rows === 0) {
// OK, there is no user with that username
    if(strlen($username) < 2) {
        echo "<p> Username is too short! </p>";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p> Email address not valid! </p>";
    }
    if(strlen($password) < 4) {
        echo "<p> Password is too short! </p>";
    }
    if($password !== $confPassword) {
        echo "<p> Passwords dont match! </p>";
    }

    $query2 = "INSERT INTO Users (username, password, email) " .
        "VALUES ('$username', SHA('$password'), '$email')";
    $conn->query($query2);
    if ($conn->error) {
        printf('Connection error: ' . mysqli_connect_error());
    }
} else {
// Problem -- username is already taken
    echo "Username: $username is already taken<br>";
}
$result->free();
$conn->close();