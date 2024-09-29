<?php
require_once('../Modelo/empleados.php');

if ($_POST) {
    try {
        $modeloEmpleado = new empleado();

        $id = $_POST['id'];
        $modeloEmpleado->delete($id);
        $modeloEmpleado->deleteEmpleadoRol($id);

        header('Location: ../../index.php?mensaje=success&accion=eliminar');
        exit;
    } catch (Exception $e) {
        header('Location: ../../index.php?mensaje=error&accion=eliminar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../../index.php');
    exit;
}
