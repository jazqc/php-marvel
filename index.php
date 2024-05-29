<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una nueva sesión de curl
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardamos el resultado
$result = curl_exec($ch);

// Decodificar el resultado JSON a un array asociativo
$data = json_decode($result, true);

// Cerrar la sesión de curl
curl_close($ch);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
    <style>
        :root {
            color-scheme: light dark;
        }
        body {
            display: grid;
            place-content: center;
        }
        pre {
            font-size: 10px;
            overflow: scroll;
            height: 100px;
        }
        section {
            display: flex;
            justify-content: center;
            text-align: center;
        }
    
        img {
            margin: 0 auto;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <main>

        <section>
            <img src="<?= $data["poster_url"]; ?> "width=" 300" >
        </section>
        <hgroup>
            <h3><?= $data["title"]; ?>se estrena en <?= $data["days_until"]; ?>días</h3>
            <p>Fecha de estreno<?= $data["release_date"]; ?></p>
        </hgroup>
    </main>
</body>
</html>