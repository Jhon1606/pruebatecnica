<?php
require_once('../Modelo/empleados.php');

if ($_POST) {
    try {
        $modeloEmpleado = new empleado();

        $id = $_POST['id'];
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

        $modeloEmpleado->update($id, $nombre, $correo, $sexo, $area_id, $boletin, $descripcion);
        $modeloEmpleado->deleteEmpleadoRol($id);
        foreach ($rol as $rol_id) {
            $modeloEmpleado->addEmpleadoRol($id, $rol_id);
        }


        header('Location: ../../index.php?mensaje=success&accion=editar');
        exit;
    } catch (Exception $e) {

        header('Location: ../../index.php?mensaje=error&accion=editar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../../index.php');
    exit;
}
