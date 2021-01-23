<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'DB.php';?>
<?php include 'Includes/header.php'; ?>
    
    <div class="container p-3">
        <div class="row">
            <div class="col-md-5">
                <?php if(isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['colorMsj']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['mensaje'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="GestorGuitarra.php" method="POST">
                        <div class="form-group">
                            <b>INGRESÁ LOS DATOS DE TU GUITARRA</b>
                        </div>
                        <div class="form-group">
                            <input type="text" name="marca" class="form-control1" placeholder="Marca" autofocus=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="modelo" class="form-control1" placeholder="Modelo"/>
                        </div>
                        <div class="form-group">
                            <select name="amplificacion" class="form-control1" style="width: 60%">
                                <option name="opcion0" value="">Tipo de amplificación</option>
                                <option name="opcion1" value="Electrica">Electrica</option>
                                <option name="opcion2" value="Acustica">Acustica</option>
                                <option name="opcion3" value="Electro-acustica">Electro-Acustica</option>
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
                            <textarea name="descripcion" rows="2" cols="22" class="form-control1" placeholder="Descripción"/></textarea>
                        </div>
                        <button type="submit" name="guardar" class="btn btn-success btn-block">GUARDAR</button>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>MARCA</th><th>MODELO</th><th>TIPO</th><th>CUERDAS</th><th>FUNDA</th><th>DESCRIPCIÓN</th><th>ACCIÓN</th>
                        </tr>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM guitarra";
                            $resultado = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <td><?php echo $row['marca'];?></td>
                                    <td><?php echo $row['modelo'];?></td>
                                    <td><?php echo $row['amplificacion'];?></td>
                                    <td><?php echo $row['cantidadCuerdas'];?></td>
                                    <td><?php echo $row['incluyeFunda'];?></td>
                                    <td><?php echo $row['descripcion'];?></td>
                                    <td>
                                        <form action="GestorGuitarra.php" method="POST"> 
                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                                            <button type="submit" name="editar" class="btn btn-success">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            </svg></button>
                                            <button type="submit" name="borrar" class="btn btn-danger">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg></button>
                                        </form>
                                    </td>
                                </tr>    
                        <?php } ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>   
<?php include 'Includes/footer.php'; ?>
