<?php

$host = "localhost";
$usuario = "root";
$password = "Ecoali123!";
$bd = "ecoali";

$conn = new mysqli($host, $usuario, $password, $bd);

/* Verificar conexión */
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

/* Opcional pero recomendado */
$conn->set_charset("utf8mb4");

?>