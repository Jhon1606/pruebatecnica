<?php
require_once('Empleados/Modelo/empleados.php');

$modeloEmpleado = new empleado();
$roles = $modeloEmpleado->getRoles();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="General/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="noopener"></script>
    <script src="General/js/javascript.js"></script>
</head>

<body>
    <div class="container">
        <div>
            <strong>Prototipo de formulario para crear y modificar</strong>
            <h1>Crear empleado</h1>
            <div class="alert alert-primary" role="alert">
                Los campos con asteriscos(*) son obligatorios
            </div>
        </div>
        <div class="derecha">
            <div class="col p-2">
                <a href="index.php"><button type="button" class="btn btn-info" title="Lista de empleados"> Lista de empleados</button></a>
            </div>
        </div>

        <form id="empleadoForm" action="Empleados/Controlador/add.php" method="POST">
            <!-- Campo de Nombre Completo -->
            <div class="mb-3 form-group row">
                <label class="col-sm-3 col-form-label derecha" for="nombre" class="col-sm-3 col-form-label">Nombre completo *</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo del empleado">
                    <div class="text-danger error-message" id="error-nombre"></div>
                </div>
            </div>

            <!-- Campo de Correo -->
            <div class="mb-3 text-right form-group row">
                <label class="col-sm-3 col-form-label derecha" for="correo" class="col-sm-3 col-form-label">Correo *</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo electrónico">
                    <div class="text-danger error-message" id="error-correo"></div>
                </div>
            </div>

            <!-- Campo de Sexo -->
            <fieldset class="mb-3 text-right form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0 derecha">Sexo *</legend>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="masculino" value="Masculino">
                            <label class="form-check-label" for="masculino">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="femenino" value="Femenino">
                            <label class="form-check-label" for="femenino">
                                Femenino
                            </label>
                        </div>
                        <div class="text-danger error-message" id="error-sexo"></div>
                    </div>
                </div>
            </fieldset>

            <!-- Campo de Área (Checkbox) -->
            <div class="mb-3 text-right form-group row">
                <label class="col-sm-3 col-form-label derecha">Área *</label>
                <div class="col-sm-9">
                    <select class="form-select mb-3" name="area_id">
                        <option value="">Seleccione</option>
                        <?php
                        $areas = $modeloEmpleado->getAreas();

                        if ($areas != null) {
                            foreach ($areas as $area) {
                        ?>
                                <option value="<?php echo $area['id']; ?>"><?php echo $area['nombre']; ?></option>

                        <?php
                            }
                        }
                        ?>
                    </select>
                    <div class="text-danger error-message" id="error-area"></div>
                </div>
            </div>

            <!-- Campo de Descripción -->
            <div class="mb-3 text-right form-group row">
                <label class="col-sm-3 col-form-label derecha" for="descripcion" class="col-sm-3 col-form-label">Descripción *</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la experiencia del empleado"></textarea>
                    <div class="text-danger error-message" id="error-descripcion"></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="boletin" id="boletin">
                        <label class="form-check-label" for="boletin">
                            Deseo recibir boletin informativo
                        </label>
                    </div>
                </div>
            </div>

            <!-- Campo de Roles -->
            <fieldset class="mb-3 text-right form-group">
                <div class="row">
                    <label class="col-form-label col-sm-3 pt-0 derecha">Roles *</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <?php if (!empty($roles)): ?>
                                <?php foreach ($roles as $rol): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="rol[]" id="rol-<?php echo $rol['id']; ?>" value="<?php echo $rol['id']; ?>">
                                        <label class="form-check-label" for="rol-<?php echo $rol['id']; ?>">
                                            <?php echo $rol['nombre']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No hay roles disponibles.</p>
                            <?php endif; ?>
                        </div>
                        <div class="text-danger error-message" id="error-roles"></div>
                    </div>
                </div>
            </fieldset>

            <!-- Botón de Enviar -->
            <div class="mb-3 text-right form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>