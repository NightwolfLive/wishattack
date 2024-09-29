<?php

$config = parse_ini_file(__DIR__ . "/config.ini", true);

$conn = mysqli_connect(
    $config["database"]["hostname"],
    $config["database"]["username"],
    $config["database"]["password"],
    $config["database"]["database"]
);

if($conn == false){
    die("Error: Could not connect to Database. "
        . mysqlli_connect_error());
}

$dcname = $_REQUEST['dcname'];
$mcname = $_REQUEST['mcname'];
$age = $_REQUEST['age'];
$playtime = $_REQUEST['playtime'];
$description = $_REQUEST['why'];
$privacyPolicy = $_REQUEST['privacyPolicy'];
$date = date("H:i d.m.Y");
$unixTime = strtotime($date);

if (empty($privacyPolicy)) {
    echo '<script>
        alert("Bitte akzeptiere die Datenschutzbestimmung.");
        window.history.back();
    </script>';
    exit();
}

$sql = "INSERT INTO wishattack.registrations VALUES ('$dcname','$mcname','$playtime','$description','$privacyPolicy','$date')";

if(mysqli_query($conn, $sql)){
    header('Location: success.html');
}

mysqli_close($conn);



$webhook_url = $config["webhook"]["url"];

$dcname = $_REQUEST['dcname'];
$mcname = $_REQUEST['mcname'];
$age = $_REQUEST['age'];
$playtime = $_REQUEST['playtime'];
$description = $_REQUEST['why'];
$date = date("H:i d.m.Y");


$embed = [
    "title" => "Wish Attack Registrierung",
    "description" => $description,
    "color" => hexdec("#ffffff"),
    "fields" => [
        [
            "name" => "Discord-Name",
            "value" => $dcname,
            "inline" => true
        ],
        [
            "name" => "Minecraft-Name",
            "value" => $mcname,
            "inline" => true
        ],
        [
            "name" => "Spielzeit",
            "value" => $playtime,
            "inline" => true
        ],
        [
            "name" => "Alter",
            "value" => $age,
            "inline" => true
        ]
    ],
    "footer" => [
        "text" => "Registriert am: " . $date
    ]
];


$json_data = json_encode(['embeds' => [$embed]]);


$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,  
 CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);  


if ($response) {
    echo "Nachricht erfolgreich gesendet!";
} else {
    echo "Fehler beim Senden der Nachricht: " . curl_error($ch);
}
?>