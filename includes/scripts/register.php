<?php
include './connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (register($username, $password, $email)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Register gagal. Silahkan coba lagi.";
    }
}

function register($username, $password, $email)
{
    global $conn;
    if (checkUsername($username)) {
        return false;
    }

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


function checkUsername($username)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
