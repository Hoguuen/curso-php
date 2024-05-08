
<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);

//indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



/* Ejecutamos el comando
    y guardamos el resultado
*/

$result = curl_exec($ch);

// una alternativa seria utilizar file_get_contents
// $result = file_get_contents(API_URL);
$data = json_decode($result, true);


curl_close($ch);



?>

<head>
    <meta charset="UTF-8" />
    <title>La proxima pelicula de marvel</title>
    <meta name="description" content="La proxima pelicula de marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <section>
        <img 
        src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>" 
        style="border-radius: 16px"
        />        
    </section>

    <hgroup>
    <h3> Se estrena en: <?= $data["days_until"];  ?>  Dias</h3>
    <p>Fecha de estreno: <?= $data["release_date"] ?></p>
    <p>Siguiente pelicula: <?= $data["following_production"]["title"] ?>
    </hgroup>
</main>




<style>

    :root {
        color-scheme: light dark !important;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

</style>
