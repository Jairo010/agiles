<?php
session_start();
require 'config/database.php';
$db = new Database();
$con = $db->conectar();


$id = $_GET['id'];
$sql = $con->prepare("DELETE FROM categorias WHERE cod_cat=?");
$sql->execute([$id]);
header('location:administrarCategorias.php');

?>