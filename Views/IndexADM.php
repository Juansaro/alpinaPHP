<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['tipo_u'] == 'adm') {
    } else {
        header('Location:../login.php?err=1');
    }
} else {
    header('Location:../login.php?err=1');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/login.css">

    <title>🔴Administrador</title>
</head>

<body>

    <header>
        <div class="menu-adm" style="position: absolute;">
            <?php include 'menuADM.php' ?>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
                <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
            </div>
            <div class="nuevo">
                <button type="button" class="btn btn-black" data-toggle="modal" data-target="#registrar_administrador">
                    👤 Registrar Administrador
                </button>
                <button type="button" class="btn btn-black" data-toggle="modal" data-target="#registrar_empleado">
                    👤 Registrar Empleado
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar_producto">
                    📦 Registrar producto
                </button>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="">Algo</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row ">
            <div class="table-responsive-sm">
                <table id="example" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>precio minorista</th>
                            <th>precio mayorista</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <body>
                        <?php
                        require '../conexion.php';
                        $where = "";
                        $sql = "select * from productos";
                        $resultado = $mysqli->query($sql);
                        while ($row = mysqli_fetch_array($resultado)) { ?>
                            <tr>
                                <td><?php echo $row['id_prod']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['categoria']; ?></td>
                                <td><?php echo $row['precio_u']; ?></td>
                                <td><?php echo $row['precio_m']; ?></td>
                                <td><?php echo $row['cantidad']; ?></td>
                                <td><img src="<?php echo ".." . $row['img']; ?>" style="width: 50px;"></td>
                                <td>
                                    <a href="editarProd.php?id=<?php echo $row['id_prod'] ?>" style="text-decoration: none; color: black;">Editar ✏️</a>
                                </td>
                                <td>
                                    <a href="#" data-href="../Controller/borrarProd.php?id=<?php echo $row['id_prod'] ?>" data-toggle="modal" data-target="#confirm-delete" style="text-decoration: none; color: black;">
                                        Borrar 🗑️</a>
                                </td>
                            </tr>
                            <input type="hidden" id="id" name="id" value="<?php

                                                                            ?>">

                        <?php } ?>

                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Desea eliminar este registro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-danger btn-ok">Borrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $('#confirm-delete').on('show.bs.modal', function(e) {
                                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                            });
                        </script>

                    </body>
                </table>
            </div>

        </div>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({

                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sSearch": "Buscar:",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "sProcessing": "Procesando...",
                    }

                });
            });
        </script>
</body>
</div>




<!-- Modal -->
<div class="modal fade" id="registrar_administrador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controller/nuevoUA.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center">
                        <img src="../img/logo.png" alt="">
                    </div>
                </div>
                <label for="usu"></label>
                <input type="text" id="usu" class="form-control" placeholder="👤 Usuario" name="usuario" required>
                <div id="error"></div>
                <br>
                <input type="password" class="form-control" id="pass1" placeholder="🔑 Escribe una contraseña" name="password" required>
                <div id="error1"></div>
                <br>
                <input type="password" class="form-control" id="pass2" placeholder="🔑 Confirmar contraseña" required>
                <div id="error2"></div>
                <br>
                <input type="text" class="form-control" placeholder="👤 Nombre o Nombres" name="nombres" required>
                <br>
                <input type="text" class="form-control" placeholder="👤 Apellidos" name="apellidos" required>
                <br>
                <input type="text" class="form-control" placeholder="☎️ Numero" name="telefono" size="10" maxlength="10" onkeypress="return aceptNum(event)" onpaste="return false;" required>
                <br>
                <input type="email" class="form-control" placeholder="📧 Correo electronico" name="correo" required>
                <h4>Selecciona una imagen para tu perfil</h4>
                <div class="img">
                    <label for="imagen"></label>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                </div>
                <input type="hidden" name="tipo_u" value="adm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="unirme">Guardar</button>
            </div>
            </form>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="registrar_empleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controller/nuevoUA.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center">
                        <img src="../img/logo.png" alt="">
                    </div>
                </div>
                <label for="usu"></label>
                <input type="text" id="usu" class="form-control" placeholder="👤 Usuario" name="usuario" required>
                <div id="error"></div>
                <br>
                <input type="password" class="form-control" id="pass1" placeholder="🔑 Escribe una contraseña" name="password" required>
                <div id="error1"></div>
                <br>
                <input type="password" class="form-control" id="pass2" placeholder="🔑 Confirmar contraseña" required>
                <div id="error2"></div>
                <br>
                <input type="text" class="form-control" placeholder="👤 Nombre o Nombres" name="nombres" required>
                <br>
                <input type="text" class="form-control" placeholder="👤 Apellidos" name="apellidos" required>
                <br>
                <input type="text" class="form-control" placeholder="☎️ Numero" name="telefono" size="10" maxlength="10" onkeypress="return aceptNum(event)" onpaste="return false;" required>
                <br>
                <input type="email" class="form-control" placeholder="📧 Correo electronico" name="correo" required>
                <h4>Selecciona una imagen para tu perfil</h4>
                <div class="img">
                    <label for="imagen"></label>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                </div>
                <input type="hidden" name="tipo_u" value="emp">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="unirme">Guardar</button>
            </div>
            </form>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="registrar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                    <form action="../Controller/nuevoP.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body">
                            <div class="row">
                                <div class="col text-center">
                                    <img src="../img/logo.png" alt="">
                                </div>
                            </div>
                        <input type="text" class="form-control" name="nombre" placeholder="🛍️ Nombre del producto" required>
                        <br>
                        <select name="lista" class="form-control" id="" required>
                            <option value="" disabled selected>Selecciona una categoria</option>
                            <option value="cremeria">Cremeria</option>
                            <option value="oferta">Oferta</option>
                        </select>
                        <br>
                        <input type="number" class="form-control" name="precio_u" step="0.01" placeholder="💰 Precio unidad Ejm.10.00" required>
                        <br>
                        <input type="number" class="form-control" name="precio_m" step="0.01" placeholder="💰 Precio mayoreo Ejm.10.00" required>
                        <br>
                        <input type="number" class="form-control" name="cantidad" placeholder="📦 Cantidad" required>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            Imagenes en formato <b>JPG<b>,<b> PNG<b> y <b>JPEG<b>
                        </div>
                        <br>
                        <input type="file" class="form-control" name="imagen" id="" required>

                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="unirme">Guardar</button>
            </div>
            </form>

        </div>
    </div>
</div>


<?php

$error = null;
if (isset($_GET["err"])) {
    $error = $_GET['err'];
    if ($error == 0) {
        echo '<script language="javascript">alert("Registro Exitoso");</script>';
    } else if ($error == 1) {
        echo '<script language="javascript">alert("Peticion exitosa");</script>';
    } else if ($error == 2) {
        echo '<script language="javascript">alert("Elemento borado con exito");</script>';
    } else if ($error == 4) {
        echo '<script language="javascript">alert("Repetir formulario con imagen JPG,JPEG,PNG");</script>';
    } else if ($error == 5) {
        echo '<script language="javascript">alert("Alogo salio mal intentalo mas tarde");</script>';
    }
}
?>
<input type="hidden" value="<?php echo $error; ?>" id="respuetsta">
<script>
    var nav4 = window.Event ? true : false;

    function aceptNum(evt) {
        var key = nav4 ? evt.which : evt.keyCode;
        return (key <= 13 || (key >= 48 && key <= 57));
    }
</script>
<script src="../js/validarpw.js">
    < script src = "../js/validaru.js" >
</script>

<script>
    function registro() {
        document.getElementById("formE").style.display = "block";
    }

    function cerrarE() {
        document.getElementById("formE").style.display = "none";
    }
</script>
<script>
    function registroA() {
        document.getElementById("formA").style.display = "block";
    }

    function cerrarA() {
        document.getElementById("formA").style.display = "none";
    }
</script>

<script>
    function registroP() {
        document.getElementById("formP").style.display = "block";
    }

    function cerrarP() {
        document.getElementById("formP").style.display = "none";
    }
</script>


</body>

</html>