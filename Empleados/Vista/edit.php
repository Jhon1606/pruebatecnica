<!-- Modal -->
<div class="modal fade" id="myModalEditarEmpleado" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/PruebaTecnica/Empleados/Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="ideditar" name="id">
                    <div class="mb-3 form-group row">
                        <label class="col-sm-3 col-form-label derecha" for="nombre" class="col-sm-3 col-form-label">Nombre completo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo del empleado">
                        </div>
                    </div>

                    <div class="mb-3 text-right form-group row">
                        <label class="col-sm-3 col-form-label derecha" for="correo" class="col-sm-3 col-form-label">Correo</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="correo" id="email" placeholder="Correo electrónico">
                        </div>
                    </div>

                    <fieldset class="mb-3 text-right form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0 derecha">Sexo</legend>
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
                            </div>
                        </div>
                    </fieldset>

                    <div class="mb-3 text-right form-group row">
                        <label class="col-sm-3 col-form-label derecha">Área</label>
                        <div class="col-sm-9">
                            <select class="form-select mb-3" name="area_id" id="area_id">
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
                        </div>
                    </div>

                    <div class="mb-3 text-right form-group row">
                        <label class="col-sm-3 col-form-label derecha" for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la experiencia del empleado"></textarea>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="boletin" id="boletin">
                                <label class="form-check-label" for="boletin">
                                    Deseo recibir boletin informativo
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>