<?php
session_start();
include './connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login($username, $password)) {
        header("Location: ../../frontend/home.html");
        exit();
    } else {
        echo "Login gagal. Username atau password salah.";
    }
}


function login($username, $password)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        // $_SESSION['password'] = $row['password'];
        return true;
    } else {
        return false;
    }
}

// function isLogin()
// {
//     if (isset($_SESSION['username'])) {
//         header('location: ../index.html');
//         return true;
//     } else {
//         header('location: ../login.php');
//         return false;
//     }
// }

// function logout()
// {
//     session_destroy();
//     header('location: ../index.html');
// }
