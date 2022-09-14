<?php
$mysqli=new mysqli ('localhost','root','','alpina_desarrollo');
if($mysqli->connect_error){
	die('error: '.$mysqli->connect_error);
}		
?>

