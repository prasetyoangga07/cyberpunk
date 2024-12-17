<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    session_start();
    require_once './login.php';

    if (!isset($_SESSION['username'])) {
        header('Location: ../login.php');
        exit;
    }

    echo '<h1>Welcome to the dashboard!</h1>';
    echo '<p>Selamat datang, ' . $_SESSION['username'] . '</p>';
    echo '<a href="./logout.php">Logout</a>';
    ?>
</body>

</html>