<?php
require_once("../../Empleados/Modelo/empleados.php");

$id = $_POST["id"];
$arreglo = array();

$modeloEmpleado = new empleado();
$informacionEmpleado = $modeloEmpleado->getById($id);
$infoRolEmpleado = $modeloEmpleado->getEmpleadoRol($id);

if ($informacionEmpleado != null) {

    foreach ($informacionEmpleado as $infoEmpleado) {

        $arreglo[] = array(
            "id" => $infoEmpleado["id"],
            "nombre" => $infoEmpleado["nombre"],
            "email" => $infoEmpleado["email"],
            "sexo" => $infoEmpleado["sexo"],
            "area_id" => $infoEmpleado["area_id"],
            "boletin" => $infoEmpleado["boletin"],
            "descripcion" => $infoEmpleado["descripcion"],
            "roles" => $infoRolEmpleado,
        );
    }
}

echo json_encode($arreglo);
