<?php
const URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
    <title>La próxima película del MCU</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <h1><?= $data["title"] ?></h1>
    <img src="<?= $data["poster_url"]; ?>"  width="500" alt="Poster de <?= $data["title"]; ?>" title="<?= $data["title"]; ?>"/>
    <br/>
    <h2>Se estrena en <?= $data['days_until'] ?> días</h2>
    <h3>Fecha de estreno: <time><?= $data["release_date"] ?></time></h3>
    <p>La siguiente será: <?= $data["following_production"]['title'] ?></p>
</main>

<style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    img {
        border-radius: 16px;
    }
</style>