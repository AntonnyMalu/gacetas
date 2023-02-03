<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";

function existeMiembro($cargos, $id=null){
    $row = null;
    $query = new Query();
    
    if(!$id){
        $sql1 = "SELECT * FROM `miembros` WHERE `cargos_id` = '$cargos' AND `band` = '1'";
    }else{
        $sql1 = "SELECT * FROM `miembros` WHERE `cargos_id` = '$cargos' AND `band` = '1' AND `id` != '$id'";
    }
    $exite = $query->getFirst($sql1);

    if($exite){
        return true;
    }else{
        return false;
    }

}
//USUARIOS NUEVOS
function crearMiembro($tipo, $cargos_id, $nombre, $profesion, $telefono)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existeMiembro($cargos_id);
    if($existe){

        return false;

    }else{

        $sql = "INSERT INTO `miembros` (`tipo`, `cargos_id`, `nombre`, `profesion`, `telefono`) 
    VALUES ('$tipo', '$cargos_id', '$nombre', '$profesion', '$telefono');";
    $row = $query->save($sql);
    return $row;

    }
    
}


//EDITAR USUARIOS
function editarMiembro($id, $tipo, $profesion, $nombre, $cargos_id, $telefono)
{
    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `miembros` WHERE `id` = '$id'";
    $miembros = $query->getFirst($sql1);
    $existe = existeMiembro($cargos_id, $id);
     if(!$existe){
        if ($miembros) {

            $hoy = date("Y-m-d");
            $sql = "UPDATE `miembros` SET `tipo`='$tipo', `cargos_id`='$cargos_id', `nombre`='$nombre', `profesion`='$profesion', `telefono`='$telefono' WHERE  `id`= $id;";
            $row = $query->save($sql);
            return $row;
    
        } else {
    
            return false;
    
        }
     }else{
        return false;
     }

    

}


//ELIMINAR USUARIOS
function eliminarMiembro($id)
{
    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `miembros` WHERE `id` = '$id'";
    $miembros = $query->getFirst($sql1);

    if ($miembros) {

        $hoy = date("Y-m-d");
        $sql = "UPDATE `miembros` SET `band`='0' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;

    } else {

        return false;

    }


}
 

if ($_POST) {
    //GUARDAR NUEVO MIEMBRO
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['tipo']) &&!empty($_POST['profesion']) && !empty($_POST['cargo']) && !empty($_POST['nombre']) && isset($_POST['telefono'])) {

            $tipo = $_POST['tipo'];
            $profesion = $_POST['profesion'];
            $cargos_id = $_POST['cargo'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];

            $miembros = crearMiembro($tipo, $cargos_id, $nombre, $profesion, $telefono);

            if ($miembros) {

                $alert = "success";
                $message = "Usuario creado exitosimansansw";
                crearFlashMessage($alert,$message, '../miembros/');


            } else {
                $alert = "warning";
                $message = "No se puede registrar un miembro con ese cargo porque ya existe, elimine primero el que ya esta registrado";
                crearFlashMessage($alert,$message, '../miembros/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../miembros/');
        }

    }

    


}

if ($_POST['opcion'] == "editar") {

    if (!empty($_POST['miembros_id']) &&!empty($_POST['cargo']) && !empty($_POST['nombre']) && !empty($_POST['profesion']) && !empty($_POST['tipo'])) {

        $id = $_POST['miembros_id'];
        $nombre = $_POST['nombre'];
        $profesion = $_POST['profesion'];
        $cargos_id = $_POST['cargo'];
        $tipo = $_POST['tipo'];
        $telefono = $_POST['telefono'];

        $miembro = editarMiembro($id, $tipo, $profesion, $nombre,$cargos_id , $telefono);


        if ($miembro) {


            $alert = "success";
            $message = "Miembro creado exitosamente";
            crearFlashMessage($alert, $message, '../miembros/');


        } else {
            $alert = "warning";
            $message = "No se puede registrar un miembro con ese cargo porque ya existe, elimine primero el que ya esta registrado";
            crearFlashMessage($alert, $message, '../miembros/');
        }


    } else {
        $alert = "danger";
        $message = "faltan datos";
        crearFlashMessage($alert, $message, '../miembros/');
    }



}


if ($_POST['opcion'] == "eliminar") {

    if (!empty($_POST['miembros_id'])){

        $id = $_POST['miembros_id'];

        $miembros = eliminarMiembro($id);

        if ($miembros) {
            $alert = "success";
            $message = "Asistente Eliminado";
            crearFlashMessage($alert, $message, '../miembros');
        } else {
            $alert = "warning";
            $message = "Error";
            crearFlashMessage($alert, $message, '../miembros');
        }

    } else {
        $alert = "danger";
        $message = "faltan datos";
        crearFlashMessage($alert, $message, '../miembros');
    }

}




?>