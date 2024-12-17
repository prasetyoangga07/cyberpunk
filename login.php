<?php
session_start();
include './backend/config.php';

$error_message = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login($username, $password)) {
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Login gagal. Username atau password salah.";
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
        return true;
    } else {
        return false;
    }
}
function isLogin()
{
    if (isset($_SESSION['username'])) {
        header('location: ../index.html');
        return true;
    } else {
        header('location: ../login.php');
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Login Account</title>
    <style>
        @font-face {
            font-family: "Montserrat-Medium";
            src: url(font/Montserrat-Medium.ttf);
        }

        @font-face {
            font-family: "Montserrat-Bold";
            src: url(font/Montserrat-Bold.ttf);
        }

        @font-face {
            font-family: "Montserrat-ExtraBold";
            src: url(font/Montserrat-ExtraBold.ttf);
        }

        .struktur {
            position: relative;
            height: 100vh;
            background-image: url('images/tekstur.png');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="elips"></div>
    <div class="struktur"></div>
    <div class="images">
        <img src="images/kota.png" alt="Cyberpunk kota" class="kota">
        <img src="images/logo.png" alt="Cyberpunk Logo" class="logocreate">
        <img src="images/karakter.png" alt="Cyberpunk Character" class="charactercreate">
    </div>
    <div class="content-create">
        <div class="welcome-text">
            <h2>LOGIN ACCOUNT</h2>
        </div>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <span class="icon"><i class="fa-solid fa-at"></i></span>
                <input type="text" placeholder="Masukan Username" name="username">
            </div>
            <div class="input-group">
                <label for="password" class="mb-4">Password</label>
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" placeholder="Masukan password" name="password">
            </div>
            <div>
                <?php if (!empty($error_message)): ?>
                    <div style="color: red;
    font-size: 12px;"><?php echo $error_message; ?></div>
                <?php endif; ?>
            </div>
            <div class=" buttons">
                <button type="button" onclick="goBack()">BACK</button>
                <input type="submit" value="LOGIN" name="login">
            </div>
        </form>
    </div>
    <script>
        function goBack() {
            window.location.href = "index.html";
        }

        function confirmLogin() {
            window.location.href = "home.html";
        }
    </script>
</body>

</html>