<?php
include './backend/config.php';

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (register($username, $password, $email)) {
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Sign Up gagal. Username atau password salah.";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Create Account</title>
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
            /* width: 100vw; */
            height: 100vh;
            background-image: url('images/tekstur.png');
            background-size: cover;
            background-position: center;
            /* overflow: hidden; */
        }
    </style>
</head>

<body>
    <div class="elips"></div>
    <div class="struktur"></div>
    <div class="images">
        <img src="images/kota.png" alt="Cyberpunk kota" class="kota">
        <img src="images/logo.png" alt="Cyberpunk Logo" class="logologin">
        <img src="images/karakter.png" alt="Cyberpunk Character" class="characterlogin">
    </div>
    <div class="content-login">
        <div class="welcome-text">
            <h2>CREATE ACCOUNT</h2>
        </div>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label for="username">Email</label>
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email">
            </div>
            <div class="input-group">
                <label for="username">Password</label>
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <span class="icon2"><i class="fa-solid fa-eye"></i></span>
                <input type="password" name="password">
            </div>
            <div>
                <?php if (!empty($error_message)): ?>
                    <div style="color: red;
    font-size: 12px;"><?php echo $error_message; ?></div>
                <?php endif; ?>
            </div>
            <div class="buttons">
                <button class="back" onclick="goBack()">BACK</button>
                <input type="submit" value="CONFIRM" class="confirm" name="signup"></input>
            </div>
        </form>
    </div>
    <script>
        function goBack() {
            window.location.href = "index.html";
        }


        function confirmCreate() {
            window.location.href = "login.html";
        }
    </script>
</body>

</html>