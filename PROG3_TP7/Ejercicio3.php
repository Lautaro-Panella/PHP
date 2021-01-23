<?php
    // Creo nuevo archivo .txt y lo abro.
    $archivo = fopen("nuevoArchivo.txt", "w") or die("No es posible abrir el archivo!");
    // Creo un string de ejemplo.
    $texto = "Ejemplo-de-escritura-de-un-archivo-de-php";
    // Escribo el string en mi nuevoArchivo.txt.
    fwrite($archivo, $texto);
    // Cierro el archivo .txt.
    fclose($archivo);
    // Abro el archivo nuevoArchivo.txt.
    $archivo1 = fopen("nuevoArchivo.txt", "r") or die("No es posible abrir el archivo!");
    // Guardo el contenido del archivo como string.
    $cadena = fread($archivo1,filesize("nuevoArchivo.txt"));
    // Muestro el string obtenido.
    echo $cadena . "<br>";
    // Convierto en un arreglo el string separando por guión medio.
    $arreglo = explode("-", $cadena);
    // Muestro los elementos del string.
    foreach ($arreglo as $value) {
        echo $value . "<br>";
    }
?>

