<?php
session_start();
// include './login.php';

if (!isset($_SESSION['username'])) {
    header("Location: app.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_page.css">
    <title>Cyberpunk Page</title>
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

        .gambar {
            background-image: url('images/tekstur2.png');
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Cyberpunk Logo">
        </div>
        <div class="nav-buttons">
            <a href="frame1.html">Home</a>
            <a href="index.php?logout=true">Logout</a>
            <?php
            if (isset($_GET['logout'])) {
                session_destroy();
                header("Location: app.html");
                exit;
            }
            ?>
        </div>
    </header>
    <div class="warna"></div>
    <div class="gif">
        <img src="images/Sequence-01.gif" alt="gif">
    </div>
    <div class="hero">
        <h1>Welcome to the world, User!</h1>
        <p>We are so happy to see you here!<br>
            Scroll down to start the adventure.</p>
    </div>
    <div class="kotak"></div>

    <div class="gambar">
        <section class="content-section">
            <div class="elips-content"></div>
            <div class="content-title">
                <h2>YOUR LEGEND STARTS HERE</h2>
                <p>Step into the shoes of V, a cyberpunk mercenary for hire and do what it takes to<br>
                    make a name for yourself in Night City, a megalopolis obsessed with power, glamour,<br>
                    and body modification. Legends are made here. What will yours be?</p>
            </div>
            <div class="grid">
                <button class="nav-btn prev-btn"></button>
                <div class="card-container" id="card-container">
                    <div class="card">
                        <a href="frame2.html">
                            <img src="images/image1.png" alt="What's New">
                        </a>
                    </div>
                    <div class="card">
                        <a href="frame3.html">
                            <img src="images/image2.png" alt="Story">
                        </a>
                    </div>
                    <div class="card">
                        <a href="frame4.html">
                            <img src="images/image3.png" alt="Characters">
                        </a>
                    </div>
                    <div class="card">
                        <a href="frame6.html">
                            <img src="images/image4.png" alt="Gameplay">
                        </a>
                    </div>
                    <div class="card">
                        <a href="frame2.html">
                            <img src="images/image5.png" alt="What's New">
                        </a>
                    </div>
                    <div class="card">
                        <a href="frame3.html">
                            <img src="images/image6.png" alt="Story">
                        </a>
                    </div>
                </div>
                <button class="nav-btn next-btn"></button>
            </div>
        </section>

        <section class="form-section">
            <div class="elips-form"></div>
            <div class="form-title">
                <p>GET THE ULTIMATE<br> CYBERPUNK 2077 EXPERIENCE</p>
                <p class="subtitle" style="font-size: 20px;">GET YOUR ROLE</p>
            </div>
            <div class="form-container">
                <form>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="name">Silahkan isi nama anda</label>
                            <input type="text" id="name" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <label for="weapon">Apa senjata favorit anda?</label>
                            <select id="weapon">
                                <option value="">Pilih salah satu</option>
                                <option value="tactical">Serangan Taktis</option>
                                <option value="combat">Head-on Combat</option>
                                <option value="creative">Strategi Kreatif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="fighting-style">Apa gaya bertarung Anda?</label>
                            <select id="fighting-style">
                                <option value="">Pilih salah satu</option>
                                <option value="hacking">Hacking Tools</option>
                                <option value="heavy-weapons">Senjata Berat</option>
                                <option value="gadgets">Gadget Canggih</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="background">Pilih latar belakang Anda</label>
                            <select id="background">
                                <option value="">Pilih salah satu</option>
                                <option value="hacker">Hacker Elit</option>
                                <option value="mercenary">Tentara Bayaran</option>
                                <option value="engineer">Insinyur Teknologi</option>
                            </select>
                        </div>
                    </div>
                    <button type="button">CONFIRM</button>
                </form>
            </div>
        </section>

        <footer class="frame1">
            <div class="text">
                <p>praktikum-pemweb-cyberpunk @ifunsoed23</p>
            </div>
        </footer>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            const scrollTop = window.scrollY;

            if (scrollTop > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        window.onload = function() {
            const cardContainer = document.getElementById('card-container');
            let isDown = false;
            let startX;
            let scrollLeft;

            cardContainer.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - cardContainer.offsetLeft;
                scrollLeft = cardContainer.scrollLeft;
            });

            cardContainer.addEventListener('mouseleave', () => {
                isDown = false;
            });

            cardContainer.addEventListener('mouseup', () => {
                isDown = false;
            });

            cardContainer.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - cardContainer.offsetLeft;
                const walk = (x - startX) * 3;
                cardContainer.scrollLeft = scrollLeft - walk;
            });
        }
    </script>
</body>

</html>