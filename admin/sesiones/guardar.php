<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";
$modulo = "sesiones";
$alert = null;
$message = null;

function ultimaSesion(){

    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `sesiones` ORDER BY `id` DESC;";
    $usuario = $query->getFirst($sql1);
    return $usuario['id'];



}

function getMiembros()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `miembros` WHERE `band`= 1 ORDER BY `cargos_id` ASC ";
    $rows = $query->getAll($sql);
    return $rows;
}


//USUARIOS NUEVOS
function crearSesiones($codigo, $tipo, $fecha, $hora)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $sql = "INSERT INTO `sesiones` (`codigo`, `tipo`, `fecha`, `hora`, `band`, `date`) VALUES ('$codigo', '$tipo', '$fecha', '$hora', '1', '$hoy');";
    $row = $query->save($sql);
    $id = ultimaSesion();
    $miembros = getMiembros();

    foreach($miembros as $miembro){
        $profesion = $miembro['profesion'];
        $nombre = $miembro['nombre'];
        $cargo = $miembro['cargos_id'];
        $telefono = $miembro['telefono'];
        $invitado = $miembro['tipo'];
        $sql2 = "INSERT INTO `asistencias` (`sesiones_id`, `profesion`, `nombre_completo`, `cargo`, `telefono`, `invitado`) 
        VALUES ('$id', '$profesion', '$nombre', '$cargo', '$telefono', '$invitado');";
        $row2 = $query->save($sql2);
        
    }


    return $row;
}


//editar USUARIOS
function editareSesion($codigo, $tipo, $fecha, $hora, $id)
{
    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `sesiones` WHERE `id` = '$id'";
    $usuario = $query->getFirst($sql1);

    if ($usuario) {

        $hoy = date("Y-m-d");
        $sql = "UPDATE `sesiones` SET `codigo`='$codigo', `tipo`='$tipo', `fecha`='$fecha', `hora`='$hora', `date`='$hoy' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;

    } else {

        return false;

    }


}



//ELIMINAR USUARIOS
function eliminarSesion($id)
{
    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `sesiones` WHERE `id` = '$id'";
    $usuario = $query->getFirst($sql1);

    if ($usuario) {

        $hoy = date("Y-m-d");
        $sql = "UPDATE `sesiones` SET `band`='0' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;

    } else {

        return false;

    }


}



if ($_POST) {
    //GUARDAR NUEVO USUARIO
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['codigo']) && !empty($_POST['hora']) && !empty($_POST['fecha']) && !empty($_POST['tipo'])) {

            $codigo = strtoupper($_POST['codigo']);
            $hora = $_POST['hora'];
            $fecha = $_POST['fecha'];
            $tipo = $_POST['tipo'];

            $sesiones = crearSesiones($codigo, $tipo, $fecha, $hora);

            if ($sesiones) {


                $alert = "success";
                $message = "Usuario creado exitosimansansw";
                crearFlashMessage($alert, $message, '../sesiones/');


            } else {
                $alert = "danger";
                $message = "error";
                crearFlashMessage($alert, $message, '../sesiones/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos: codigo: ".$_POST['codigo']. " hora: ". $_POST['hora']." fecha: ". $_POST['fecha']." tipo: ". $_POST['tipo'];
            crearFlashMessage($alert, $message, '../sesiones/');
        }

    }


    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['codigo']) && !empty($_POST['hora']) && !empty($_POST['fecha']) && !empty($_POST['tipo']) && !empty($_POST['sesiones_id'])) {

            $codigo = strtoupper($_POST['codigo']);
            $hora = $_POST['hora'];
            $fecha = $_POST['fecha'];
            $tipo = $_POST['tipo'];
            $id = $_POST['sesiones_id'];

            $sesiones = editareSesion($codigo, $tipo, $fecha, $hora, $id);

            if ($sesiones) {


                $alert = "success";
                $message = "Sesion eDITADA exitosimansansw";
                crearFlashMessage($alert, $message, '../sesiones/');


            } else {
                $alert = "danger";
                $message = "error";
                crearFlashMessage($alert, $message, '../sesiones/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos: codigo: ".$_POST['codigo']. " hora: ". $_POST['hora']." fecha: ". $_POST['fecha']." tipo: ". $_POST['tipo'];
            crearFlashMessage($alert, $message, '../sesiones/');
        }

    }


    //Geliminar NUEVO USUARIO
    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['sesiones_id'])) {

            $id = $_POST['sesiones_id'];
            $eliminar = eliminarSesion($id);

            if($eliminar){
                $alert = "success";
                $message = "Sesion eliminada exitosimansansw";
                crearFlashMessage($alert, $message, '../sesiones/');
            } else {
                $alert = "danger";
                $message = "error";
                crearFlashMessage($alert, $message, '../sesiones/');
            }

        }else{
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../sesiones/');
        }


    }

}


?>