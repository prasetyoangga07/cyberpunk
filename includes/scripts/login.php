<?php
session_start();
include './connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Login gagal. Username atau password salah.";
    }
}

function login($username, $password)
{
    global $conn;
    $sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        return true;
    } else {
        return false;
    }
}

function isLogin()
{
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}

function logout()
{
    session_destroy();
    header('location: ../index.php');
}
