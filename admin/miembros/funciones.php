<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "miembros";

$alert = null;
$message = null;


//LISTAR USUARIOS
function getMiembros()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `miembros` WHERE `band`= 1 ORDER BY `cargos_id` ASC ";
    $rows = $query->getAll($sql);
    return $rows;
}

function getAllCargos()
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `cargos`;";
    $row = $query->getAll($sql);
    return $row;
}

function getCargo($id)
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `cargos` WHERE `id` = '$id'";
    $row = $query->getFirst($sql);
    if($row){
        return $row['cargo'];
    }else{
        return "Cargo no definido";
    }
    
}

if ($_GET) 
{
    if(!empty($_GET['id'])){
        $cargos_id = $_GET['id'];
        $cargos = getCargo($cargo_id);
    }
}

$miembros = getMiembros();
$cargos = getAllCargos();
?>
