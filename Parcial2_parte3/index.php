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
        <form action="index.php" method="POST">
            <input type="text" placeholder="Tamaño de la matriz" name="tamanio"/><br>
            <input type="text" placeholder="Fila" name="fila"/><br>
            <input type="text" placeholder="Columna" name="columna"/><br>
            <input type="text" placeholder="Valor" name="valor"/><br>
            <button type="submit" id="generar" name="generar">Generar matriz</button><br>
        </form> 
        <?php
        if(isset($_POST['generar'])) {
            $tamanio = $_POST['tamanio'];
            $fila = ($_POST['fila']);
            $columna = ($_POST['columna']);
            $valor = $_POST['valor'];
        
            if (($tamanio % 2) == 0 || $tamanio < 5 || $fila > $tamanio || $columna > $tamanio || $tamanio == null || $fila == null || $columna == null || $valor == null) {
                echo "Los valores no son correctos, vuelva a intentarlo!";    
            }
            else {
                echo "Matriz generada:";
                $matriz = array();
                for($i = 0; $i < $tamanio; $i++) { 
                    for($j = 0; $j < $tamanio; $j++) {
                        $matriz [$i] [$j] = 0;    
                    }
                }
                if ($fila < $tamanio-1 && $columna < $tamanio-1) {
                    $matriz [$fila] [$columna] = $valor;
                    $valor++;
                    $matriz [$fila] [$columna+1] = $valor;
                    $valor++;
                    $matriz [$fila+1] [$columna+1] = $valor;
                    $valor++;
                    $matriz [$fila+1] [$columna] = $valor;
                    $valor++;
                    $matriz [$fila+1] [$columna-1] = $valor;
                    $valor++;
                    $matriz [$fila] [$columna-1] = $valor;
                    $valor++;
                    $matriz [$fila-1] [$columna-1] = $valor;
                    $valor++;
                    $matriz [$fila-1] [$columna] = $valor;
                    $valor++;
                    $matriz [$fila-1] [$columna+1] = $valor;
                }
                if ($fila == $tamanio-1 && $columna == $tamanio-1) {
                    $matriz [$fila] [$columna] = $valor;
                    $valor++;
                    $matriz [$fila] [$columna-1] = $valor;
                    $valor++;
                    $matriz [$fila-1] [$columna-1] = $valor;
                    $valor++;
                    $matriz [$fila-1] [$columna] = $valor;
                    $valor++;
                    $matriz [$fila-1] [$columna+1] = $valor;
                }
                if ($fila == $tamanio && $columna == $tamanio) {
                    $valor = $valor + 6;
                    $matriz [$fila-1] [$columna-1] = $valor;   
                }

                echo "<table border='1' style='width:50%'>";
                    for($i = 0; $i < $tamanio; $i++) {
                        echo "<tr>";
                        for($j = 0; $j < $tamanio; $j++) {
                            echo "<td>".$matriz [$i] [$j]."</td>";
                        }
                        echo "</tr>";
                    }
                echo "</table>";
            }      
        }
        ?>   
    </body>
</html>
