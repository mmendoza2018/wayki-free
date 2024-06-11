<?php
$conexion = mysqli_connect("localhost", "root", "", "waiky");

$serviciosCat = mysqli_query($conexion, "SELECT * FROM servicios_categorias");

$sql = "SELECT *,
sesu.titulo as tituloSubCategoria, 
seca.titulo as tituloCategoria, 
sesu.id as idSubCategoria, 
sesu.descripcion as descripcionSubCategoria,
sesu.precio as precioSubCategoria,
sesu.cantidad_max_personas as personasSubCategoria
FROM servicios_subcategorias sesu INNER JOIN servicios_categorias seca ON sesu.servicio_cat_id = seca.id WHERE esstado_ser_subcategoria = 1";
$serviciosCategorias = mysqli_query($conexion, $sql);

?>
<div>

    <div class="table-responsive mt-3 px-3">
        <table class="table table-sm table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>categoria</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cantidad max. personas</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($serviciosCategorias as $serviciosCategoria) : ?>
                    <tr>
                        <td><?= $serviciosCategoria["idSubCategoria"] ?></td>
                        <td><?= $serviciosCategoria["tituloSubCategoria"] ?></td>
                        <td><?= $serviciosCategoria["tituloCategoria"] ?></td>
                        <td><?= $serviciosCategoria["descripcionSubCategoria"] ?></td>
                        <td><?= $serviciosCategoria["precioSubCategoria"] ?></td>
                        <td><?= $serviciosCategoria["personasSubCategoria"] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#updateModal" onclick="obtenerSubCategoriaServicio('<?= $serviciosCategoria['idSubCategoria'] ?>')" class="btn btn-warning">Actualizar</a>
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
                    <form id="formServicioCatAct" onsubmit="actualizarSubCategoriaServicio(this)">
                        <input type="hidden" name="id" id="idAct" data-validate>
                        <label for="">Titulo</label>
                        <input type="text" class="form-control mb-1" name="titulo" id="tituloAct" data-validate>
                        <label for="">Servicio</label>
                        <select name="servicio_cat_id" id="servicio_cat_idAct" id="" class="form-control mb-1" data-validate>
                            <option value="" selected disabled>Seleccione...</option>
                            <?php foreach ($serviciosCat as $servicio) : ?>
                                <option value="<?= $servicio["id"] ?>"><?= $servicio["titulo"] ?></option>
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