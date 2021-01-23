<!DOCTYPE html>
<html>
    <body>
        <?php 
        $numero1 = $_POST["valor1"];
        $numero2 = $_POST["valor2"];
        if ($numero1 != $numero2 || $numero1 == null || $numero2 == null) {
            echo "Los valores no son correctos, vuelva a intentarlo!";
        }
        else {
            $contador = $numero1;
            echo "<table border='1' style='width:50%'>";
                for($i = 0; $i < $numero1; $i++) {
                    echo "<tr>";
                    for($j = 0; $j < $numero1; $j++) {
                        if ($j == $contador-1) {
                            echo "<td>1</td>";  
                        }
                        else {
                            echo "<td>0</td>";
                        }
                    }
                    $contador--;
                    echo "</tr>";
                }
            echo "</table>";
        }
        ?>
        <form action="Ejercicio1.php">
            <button type="submit" id="volver" name="volver">VOLVER</button>
        </form>    
    </body>
</html>



