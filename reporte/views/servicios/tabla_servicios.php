<?php
$conexion = mysqli_connect("localhost", "root", "", "waiky");
$servicios = mysqli_query($conexion, "SELECT * FROM servicios WHERE estado_servicio = 1");

?>

<div>

    <div class="table-responsive mt-3 px-3">
        <table class="table table-sm table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Fecha registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($servicios as $servicio) : ?>
                    <tr>
                        <td><?= $servicio["id"] ?></td>
                        <td><?= $servicio["descripcion"] ?></td>
                        <td><?= $servicio["fecha_registro"] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#updateModal" onclick="obtenerServicio('<?= $servicio['id'] ?>')" class="btn btn-warning">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar registros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formServicioAct" onsubmit="actualizarServicio(this)">
                        <input type="hidden" name="id" id="idAct" data-validate>
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control mb-1" name="descripcion" id="descripcionAct" data-validate>
                        <label for="">Estado</label>
                        <select name="estado" class="form-control" id="estadoAct">
                            <option value="1">Habilitado</option>
                            <option value="0">eliminar</option>
                        </select>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mt-2">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>