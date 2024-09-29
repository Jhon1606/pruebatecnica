<?php
require_once('Empleados/Modelo/empleados.php');

$modeloEmpleado = new empleado();
$empleados = $modeloEmpleado->getEmpleados();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="General/css/style.css">
    <script src="General/js/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="noopener"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
    <div class="container">
        <div>
            <strong>Prototipo para listar todos los productos</strong>
            <h1>Lista de empleados</h1>
        </div>
        <div class="derecha">
            <div class="col p-2">
                <a href="form.php"><button type="button" class="btn btn-info" title="Crear"><i class="fa-solid fa-user-plus"></i> Crear</button></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><i class="fa-solid fa-user"></i> Nombre</th>
                    <th scope="col"><i class="fa-solid fa-at"></i> Email</th>
                    <th scope="col"><i class="fa-solid fa-venus-mars"></i> Sexo</th>
                    <th scope="col"><i class="fa-solid fa-briefcase"></i> Area</th>
                    <th scope="col"><i class="fa-solid fa-envelope"></i> Boletín</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($empleados != null) {
                    foreach ($empleados as $empleado) {
                ?>
                        <tr>

                            <td><?php echo $empleado['nombre'] ?></td>
                            <td><?php echo $empleado['email'] ?></td>
                            <?php
                            if ($empleado['sexo'] == 'F') {
                            ?>
                                <td>Femenino</td>
                            <?php
                            } else {
                            ?>
                                <td>Masculino</td>
                            <?php
                            }
                            ?>
                            <td><?php echo $empleado['area'] ?></td>

                            <?php
                            if ($empleado['boletin'] == 1) {
                            ?>
                                <td>Sí</td>
                            <?php
                            } else {
                            ?>
                                <td>No</td>
                            <?php
                            }
                            ?>
                            <td><a href="javascript:void(0);" onclick="modalEditarEmpleado('<?php echo $empleado['id']; ?>')"><i class="fa-regular fa-pen-to-square"></i> </a> </td>
                            <td><a href="javascript:void(0);" onclick="modalEliminar('<?php echo $empleado['id']; ?>')"><i class="fa-solid fa-trash-can"></i> </a> </td>

                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    require_once('../PruebaTecnica/Empleados/Vista/edit.php');
    require_once('../PruebaTecnica/Empleados/Vista/delete.php');
    ?>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'success'): ?>
        <script>
            let mensaje = "El registro se realizó con éxito.";
            <?php if (isset($_GET['accion'])): ?>
                let accion = "<?php echo $_GET['accion']; ?>";
                if (accion === 'editar') {
                    mensaje = "¡Éxito! El empleado fue editado con éxito.";
                } else if (accion === 'eliminar') {
                    mensaje = "¡Éxito! El empleado fue eliminado con éxito.";
                }
            <?php endif; ?>
            swal("¡Éxito!", mensaje, "success");
        </script>
    <?php endif; ?>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'): ?>
        <script>
            let detalle = "<?php echo isset($_GET['detalle']) ? $_GET['detalle'] : 'Ocurrió un error.'; ?>";
            swal("¡Error!", detalle, "error");
        </script>
    <?php endif; ?>


</body>

</html>