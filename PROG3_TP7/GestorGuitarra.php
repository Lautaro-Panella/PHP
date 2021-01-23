<?php
    include 'DB.php';

    if(isset($_POST['guardar'])) {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $amplificacion = $_POST['amplificacion'];
        $cantidadCuerdas = $_POST['radioBtn'];
        if(!empty($_POST['funda'])) {
            $incluyeFunda = $_POST['funda'];
        }
        else {
            $incluyeFunda = "No";
        }
        $descripcion = $_POST['descripcion'];
        Guardar($conn, $marca, $modelo, $amplificacion, $cantidadCuerdas, $incluyeFunda, $descripcion);
        $_SESSION['mensaje'] = "Guitarra guardada!";
        $_SESSION['colorMsj'] = 'primary';
        header("Location: Ejercicio4.php");
    }
    
    if(isset($_POST['editar'])) {
        $id = $_POST['id'];
        $rowId = ConsultarPorId($conn, $id);
        include 'Includes/header.php'; ?>
        <div class="container p-3">
            <div class="col-md-5">
                <div class="card card-body">
                    <form action="GestorGuitarra.php" method="POST">
                        <div class="form-group">
                            <b>INGRESÁ LOS NUEVOS DATOS</b>
                        </div>
                        <div class="form-group">
                            <input type="text" name="marca" class="form-control1" autofocus="" value="<?php echo $rowId['marca'];?>"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="modelo" class="form-control1" value="<?php echo $rowId['modelo'];?>"/>
                        </div>
                        <div class="form-group">
                            <select name="amplificacion" class="form-control1" style="width: 60%">
                                <option name="opcion0" value="">Tipo de amplificación</option>
                                <option name="opcion1" value="Eléctrica">Eléctrica</option>
                                <option name="opcion2" value="Acústica">Acústica</option>
                                <option name="opcion3" value="Electro-acústica">Electro-Acústica</option>
                                <option name="opcion4" value="<?php echo $rowId['amplificacion'];?>" selected="true"><?php echo $rowId['amplificacion'];?></option> 
                            </select>
                        </div>
                        <div class="form-group">
                            CUERDAS &nbsp; 6 &nbsp; <input type="radio" name="radioBtn" value="6"/> &nbsp;
                            7 &nbsp; <input type="radio" name="radioBtn" value="7"/> &nbsp;
                            12 &nbsp; <input type="radio" name="radioBtn" value="12"/>
                        </div>
                        <div class="form-group">
                            INCLUYE FUNDA &nbsp; <input type="checkbox" name="funda" value="Si"/>
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" rows="2" cols="22" class="form-control1"/><?php echo $rowId['descripcion'];?></textarea>
                            <input type="hidden" name="id" value="<?php echo $rowId['id'];?>"/>
                        </div>
                        <button type="submit" name="editar2" class="btn btn-success btn-block">EDITAR</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'Includes/footer.php';
    }
    
    if(isset($_POST['editar2'])) {
        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $amplificacion = $_POST['amplificacion'];
        $cantidadCuerdas = $_POST['radioBtn'];
        if(!empty($_POST['funda'])) {
            $incluyeFunda = $_POST['funda'];
        }
        else {
            $incluyeFunda = "No";
        }
        $descripcion = $_POST['descripcion'];
        
        Editar($conn, $marca, $modelo, $amplificacion, $cantidadCuerdas, $incluyeFunda, $descripcion, $id);
        $_SESSION['mensaje'] = "Guitarra editada!";
        $_SESSION['colorMsj'] = 'success';
        header("Location: Ejercicio4.php");
    }
    
    if(isset($_POST['borrar'])) {
        $id = $_POST['id'];
        Borrar($conn, $id);
        $_SESSION['mensaje'] = "Guitarra borrada!";
        $_SESSION['colorMsj'] = 'danger';
        header("Location: Ejercicio4.php");
    }
    
    function Guardar($conn, $marca, $modelo, $amplificacion, $cantidadCuerdas, $incluyeFunda, $descripcion) {
    
        $sql = "INSERT INTO guitarra (marca, modelo, amplificacion, cantidadCuerdas, incluyeFunda, descripcion) VALUES ('$marca', '$modelo', '$amplificacion', '$cantidadCuerdas', '$incluyeFunda', '$descripcion')";
        $conn->query($sql);
        $conn->close();
    }
    
    function Editar($conn, $marca, $modelo, $amplificacion, $cantidadCuerdas, $incluyeFunda, $descripcion, $id) {
        
        $sql = "UPDATE guitarra SET marca = '$marca', modelo = '$modelo', amplificacion = '$amplificacion', cantidadCuerdas = '$cantidadCuerdas', incluyeFunda = '$incluyeFunda', descripcion = '$descripcion' WHERE id = $id";
        mysqli_query($conn, $sql);
        $conn->close();
        echo $id;
    } 
    
    function Borrar($conn, $id) {
    
        $sql = "DELETE FROM guitarra WHERE id = '$id'";
        $conn->query($sql);
        $conn->close();
    }
    
    function ConsultarPorId($conn, $id) {
    
        $sql = "SELECT * FROM guitarra WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $conn->close();
        return $row;
    }
?>
