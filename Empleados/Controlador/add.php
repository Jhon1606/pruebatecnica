<?php
require_once('../Modelo/empleados.php');

if ($_POST) {
    $modeloEmpleado = new empleado();

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $sexo = $_POST['sexo'];
    $area_id = $_POST['area_id'];
    if (isset($_POST['boletin'])) {
        $boletin = $_POST['boletin'];
    } else {
        $boletin = 0;
    }
    $descripcion = $_POST['descripcion'];
    $rol = $_POST['rol'];

    $modeloEmpleado->add($nombre, $correo, $sexo, $area_id, $boletin, $descripcion);
    $empleado_id = $modeloEmpleado->getLastInsertedId();

    foreach ($rol as $rol_id) {
        $modeloEmpleado->addEmpleadoRol($empleado_id, $rol_id);
    }

    header('Location: ../../index.php?mensaje=success');
    exit;
} else {
    header('Location: ../../form.php');
}
