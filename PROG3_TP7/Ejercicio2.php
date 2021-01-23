<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="Ejercicio2.php" method="post">
            Ingrese una cadena:<input type="text" name="cadena"/><br>
            <button type="submit" id="enviar" name="enviar">ENVIAR</button><br>  
        </form>
        <?php 
            $texto = $_POST["cadena"];
            if ($texto != null) {
                $arreglo = str_split($texto);
                foreach ($arreglo as $value) {
                    echo $value . "<br>";
                }
            }
            else {
                echo "Debe ingresar una cadena!";
            }
        ?>
    </body>
</html>

