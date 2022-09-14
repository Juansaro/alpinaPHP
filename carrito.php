
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/carrito_alpina.css">

    <script src="./js/jquery-3.4.1.min.js"></script>
    <title>Carrito</title>
</head>
<body>
    <header>
        <nav class="menu">
            <a href="http://localhost/sistema/">Regresar</a>
        </nav>
    </header>
    <?php
    $n=0;
    $precio=0;
    session_start();
    if(isset($_SESSION['carrito'])){
        $response=json_decode($_SESSION['carrito']);
    }else{
        $response =[];
    }
    
        //echo "/".$res->id."-".$res->cantidad;
    ?>
    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
              <h1>Mi carrito</h1>  
            </div>
        </div>
    </div>
   <div class="container">
     <div class="row">
     <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">CodProd</th>
             <th scope="col">Nombre</th>
             <th scope="col">Imagen</th>
             <th scope="col">Precio</th>
             <th scope="col">Cantidad</th>
             <th scope="col">Stock</th>
             <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'conexion.php';
            
            foreach($response as $res){
                $sql="select * from productos where id_prod=$res->id";
                $resultado=$mysqli->query($sql);
                $row=mysqli_fetch_array($resultado)
                ?>
                <tr>
                    <td><?php echo $res->id; ?></td>
                    <td><?php echo $row['nombre'];?></td>
                    <td><img src="<?php echo ".".$row['img'];?>" style="width: 50px;"></td>
                    <td>$<?php 
                    $cuantos=$res->cantidad;
                    if ($cuantos>=3) {
                        echo $row['precio_m'];
                    }else{
                        echo $row['precio_u'];
                    }
                    ?>Pesos</td>
                    <form action="./Controller/compra.php" method="POST">
                    
                    <input type="hidden" name="ids[]" value="<?php echo $res->id; ?>">
                    <input type="hidden" name="nombres[]" value="<?php echo $row['nombre'];?>">
                    <td><input id="cant_new" onChange="return validationProducts()" type="number" name="cant[]" value="<?php echo $res->cantidad; ?>" style  ="padding= 10px;";></td>
                    <td><b id="cant_new"><?php echo $row['cantidad'];?></b></td>
                    <td><span id="email-error">asd</span></td>
                </tr>

                
            <?php
            }
            ?>                    
         </tbody>
    </table>
    </div>
     </div>
   </div>
            <div class="container">
            <div class="row">
            <div class="panel-hading text-center">
                <input type="hidden" name="toalItems" value="<?phpecho $n?>">
              <input type="submit" name="comprar" id="" value="Comprar" class="btn-primary" style="padding: 10px;">
            </div>
            </div>
            </div>
            </form>      

            <script>
                    function validationProducts() {
                        cant_new = document.getElementById("cant_new").value;
                        cant_old = document.getElementById("cant_new");
                        if(cant_new > cant_old) {
                            document.getElementById("email-error").innerHTML = "Invalid Email Address";
                            
                        }
                    }
                </script>
</body>
</html>