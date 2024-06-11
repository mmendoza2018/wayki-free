<?php
$conexion = mysqli_connect("localhost", "root", "", "waiky");

$servicios = mysqli_query($conexion, "SELECT * FROM servicios");

$sql = "SELECT *, seca.descripcion as descripcionCategoria, ser.descripcion as descripcionServicio, seca.id as idCategoria FROM servicios_categorias seca INNER JOIN servicios ser ON seca.servicio_id = ser.id WHERE esstado_ser_categoria = 1";
$serviciosCategorias = mysqli_query($conexion, $sql);

?>
<div>

    <div class="table-responsive mt-3 px-3">
        <table class="table table-sm table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Servicio</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cantidad max. personas</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($serviciosCategorias as $serviciosCategoria) : ?>
                    <tr>
                        <td><?= $serviciosCategoria["id"] ?></td>
                        <td><?= $serviciosCategoria["titulo"] ?></td>
                        <td><?= $serviciosCategoria["descripcionServicio"] ?></td>
                        <td><?= $serviciosCategoria["descripcionCategoria"] ?></td>
                        <td><?= $serviciosCategoria["precio"] ?></td>
                        <td><?= $serviciosCategoria["cantidad_max_personas"] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#updateModal" onclick="obtenerCategoriaServicio('<?= $serviciosCategoria['idCategoria'] ?>')" class="btn btn-warning">Actualizar</a>
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
                    <form id="formServicioCatAct" onsubmit="actualizarCategoriaServicio(this)">
                        <input type="hidden" name="id" id="idAct" data-validate>
                        <label for="">Titulo</label>
                        <input type="text" class="form-control mb-1" name="titulo" id="tituloAct" data-validate>
                        <label for="">Servicio</label>
                        <select name="servicio_id" id="servicio_idAct" id="" class="form-control mb-1" data-validate>
                            <option value="" selected disabled>Seleccione...</option>
                            <?php foreach ($servicios as $servicio) : ?>
                                <option value="<?= $servicio["id"] ?>"><?= $servicio["descripcion"] ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="">Descripcion</label>
                        <textarea class="form-control mb-1" name="descripcion" id="descripcionAct" id="" rows="3" data-validate></textarea>
                        <label for="">Precio</label>
                        <input type="number" class="form-control mb-1" name="precio" id="precioAct" data-validate>
                        <label for="">Cantidad maxima de personas</label>
                        <input type="number" class="form-control mb-1" name="cantidad_max_personas" id="cantidad_max_personasAct" data-validate>
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