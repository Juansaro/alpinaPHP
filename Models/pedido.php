<?php
include 'Database.php';

class pedir{
    function agregarPed($nm,$tel,$sc,$est,$noV,$cod){
        try{
            $connection=Database::instance();
            $sql="insert into pedido values('','$nm','$tel','$sc','$est','$noV','$cod')";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(PDOException $Exception){
                print "Error!:".$Exception->getMessage();
            }
            return 0;
    }
}


?>