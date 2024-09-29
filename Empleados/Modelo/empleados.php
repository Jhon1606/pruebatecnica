<?php
require_once(__DIR__ . '/../../conexion.php');

class empleado extends conexion
{

    public function __construct()
    {
        $this->conexion = parent::__construct();
    }

    public function add($nombre, $email, $sexo, $area_id, $boletin, $descripcion)
    {
        $statement = $this->conexion->prepare("INSERT INTO empleados (nombre,email,sexo,area_id,boletin,descripcion)
                                        VALUES(:nombre, :email, :sexo, :area_id, :boletin, :descripcion)");
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':sexo', $sexo);
        $statement->bindParam(':area_id', $area_id);
        $statement->bindParam(':boletin', $boletin);
        $statement->bindParam(':descripcion', $descripcion);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../form.php');
        }
    }

    public function getLastInsertedId()
    {
        return $this->conexion->lastInsertId();
    }


    public function addEmpleadoRol($empleado_id, $rol_id,)
    {
        $statement = $this->conexion->prepare("INSERT INTO empleado_rol (empleado_id, rol_id)
                                        VALUES(:empleado_id,:rol_id)");
        $statement->bindParam(':empleado_id', $empleado_id);
        $statement->bindParam(':rol_id', $rol_id);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../form.php');
        }
    }

    public function getEmpleados()
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT a.id, a.nombre, a.email, a.sexo, b.nombre AS area, a.boletin FROM empleados AS a 
                                            INNER JOIN areas AS b ON a.area_id = b.id");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getRoles()
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM roles");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getAreas()
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM areas");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getById($id)
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM empleados WHERE id=:id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    // public function getRolesEmpleado($id)
    // {
    //     $rows = null;
    //     $statement = $this->conexion->prepare("SELECT * FROM empleado_id WHERE empleado_id=:id");
    //     $statement->bindParam(":id", $id);
    //     $statement->execute();
    //     while ($result = $statement->fetch()) {
    //         $rows[] = $result;
    //     }
    //     return $rows;
    // }

    public function update($id, $nombre, $email, $sexo, $area_id, $boletin, $descripcion)
    {
        $statement = $this->conexion->prepare("UPDATE empleados SET nombre=:nombre, email=:email, 
                                            sexo=:sexo, area_id=:area_id, boletin=:boletin, 
                                            descripcion=:descripcion 
                                            WHERE id = :id");

        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':sexo', $sexo);
        $statement->bindParam(':area_id', $area_id);
        $statement->bindParam(':boletin', $boletin);
        $statement->bindParam(':descripcion', $descripcion);

        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../form.php');
        }
    }

    public function delete($id)
    {
        $statement = $this->conexion->prepare("DELETE FROM empleados WHERE id = :id");
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../form.php');
        }
    }

    public function deleteEmpleadoRol($id)
    {
        $statement = $this->conexion->prepare("DELETE FROM empleado_rol WHERE empleado_id = :id");
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../form.php');
        }
    }
}
