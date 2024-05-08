<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);

//indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutamos el comando
    y guardamos el resultado
*/

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);

var_dump($data);







?>






<style>

    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

</style>