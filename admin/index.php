<?php

$config = parse_ini_file(__DIR__ . "/config.ini", true);

$conn = mysqli_connect(
    $config["localDatabase"]["hostname"],
    $config["localDatabase"]["username"],
    $config["localDatabase"]["password"],
    $config["localDatabase"]["database"]
);

if($conn == false){
    die("Error: Could not connect to Database. "
        . mysqlli_connect_error());
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM team WHERE username = $username AND password = $password";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: test.html");
} else {
    echo "Die Daten stimmen nicht überein.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wish Attack | PRESET</title>
    <link rel="icon" type="image/x-icon" href="Images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="">
    <script type="text/javascript" src="script.js" defer></script>
    <script async src="https://basicons.xyz/embed.js"></script>
</head>
<body>
    <header>
        <div class="nav">
            <img src="images/WA_Logo.webp" alt="Wish Attack Admin Panel">
        </div>

<!--
        <div class="mobileNav">
            <a href="index.html"><img id="mobileLogo" src="Images/WA_Logo.webp" alt="Wish Attack"></a>
            <img id="bars" src="Images/bars.svg" alt="">
        </div>

        <div id="my-menu" class="off-screen-menu">
            <img id="xIcon" src="Images/xmark.svg" alt="X">
            <img id="offImg" src="Images/WA_Logo.webp" alt="Wish Attack">
            <div class="offButtons">
                <a href="index.html">
                    <button>
                        <img src="Images/icons/home.svg" alt="">
                        Home
                    </button>
                </a>
                <a href="news.html">
                    <button>
                        <img src="Images/icons/news.svg" alt="">
                        Neuigkeiten
                    </button>
                </a>
                <a href="download.html">
                    <button>
                        <img src="Images/icons/download.svg" alt="">
                        Downloads
                    </button>
                </a>
                <a href="https://discord.gg/PjAzBjQW3G">
                    <button>
                        <img src="Images/icons/discord.svg" alt="">
                        Discord
                    </button>
                </a>
                <a href="team.html">
                    <button>
                        <img src="Images/icons/serverTeam.svg" alt="">
                        Server Team
                    </button>
                </a>
                <a id="mobileJoinLink" href="#">
                    <button id="mobileJoinBtn" class="mobileDisabled">
                        <img id="mobileJoinImg" src="Images/icons/joinVariant.svg" alt="">
                        Registrieren
                    </button>
                </a>
            </div>
        </div>
-->
    </header>




    <div class="login">
        <h1>Admin Login</h1>

        <form action="index.php" method="post">
            <input type="text" name="username" id="username" placeholder="Benutzername">

            <input type="password" name="password" id="password" placeholder="Passwort">
            <div class="showPW">
                <input type="checkbox" onclick="showPW()">
                <p>Passwort anzeigen</p>
            </div>

            <button class="loginButton">Einloggen</button>
        </form>
    </div>



    <footer>
        <div class="footLogo">
            <img src="Images/WA_Logo.webp" alt="Wish Attack Logo">
        </div>
        <div class="social">
            <div class="socialBox">
                <h2>Socials</h2>
                <ul>
                    <li>
                        <a href="https://www.instagram.com/wishattackminecraft/" target="_blank">
                            <img src="Images/instagram.svg" alt="Instagram">
                            Instagram
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@wishattackminecraft" target="_blank">
                            <img src="Images/youtube.svg" alt="Youtube">
                            Youtube
                        </a>
                    </li>
                    <li>
                        <a href="https://discord.gg/PjAzBjQW3G" target="_blank">
                            <img src="Images/discord2.svg" alt="Discord">
                            Discord
                        </a>
                    </li>
                    <li>
                        <a href="https://x.com/wishattackmc" target="_blank">
                            <img src="Images/x.svg" alt="X">
                            X (ehemals Twitter)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footInfo">
            <div class="footInfoBox">
                <h2>Informationen</h2>
                <ul>
                    <li>
                        <a href="impressum.html">Impressum</a>
                    </li>
                    <li>
                        <a href="datenschutz.html">Datenschutz</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright">© 2019-2024, Wish Attack</div>
    </footer>
</body>
</html>