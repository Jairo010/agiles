<?php
session_start();
require 'config/database.php';
$db = new Database();
$con = $db->conectar();


$id = $_GET['id'];
$sql = $con->prepare("DELETE FROM productos WHERE ID_PRO=?");
$sql->execute([$id]);
header('location:administrarProductos.php');

?>