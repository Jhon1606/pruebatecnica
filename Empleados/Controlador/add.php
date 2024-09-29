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

    // Añadimos el empleado  
    $modeloEmpleado->add($nombre, $correo, $sexo, $area_id, $boletin, $descripcion);
    // Obtener el ID del empleado recién insertado
    $empleado_id = $modeloEmpleado->getLastInsertedId();

    foreach ($rol as $rol_id) {
        $modeloEmpleado->addEmpleadoRol($empleado_id, $rol_id);
    }

    // Redirigir a index.php con un mensaje de éxito
    header('Location: ../../index.php?mensaje=success');
    exit; // Asegúrate de llamar a exit después de header
} else {
    header('Location: ../../form.php');
}
