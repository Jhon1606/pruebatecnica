<?php
require_once('../Modelo/empleados.php');

if ($_POST) {
    try {
        $modeloEmpleado = new empleado();

        $id = $_POST['id'];
        $modeloEmpleado->delete($id);

        // Redirigir con mensaje de éxito
        header('Location: ../../index.php?mensaje=success&accion=eliminar');
        exit; // Detener la ejecución
    } catch (Exception $e) {
        // Redirigir con mensaje de error
        header('Location: ../../index.php?mensaje=error&accion=eliminar&detalle=' . urlencode($e->getMessage()));
        exit; // Detener la ejecución
    }
} else {
    header('Location: ../../index.php');
    exit; // Detener la ejecución
}
