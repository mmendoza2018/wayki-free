<?php
$conexion = mysqli_connect("localhost", "root", "", "waiky");

$serviciosCat = mysqli_query($conexion, "SELECT * FROM servicios_categorias");
$clientes = mysqli_query($conexion, "SELECT * FROM clientes");
$serviciosSubCat = mysqli_query($conexion, "SELECT * FROM servicios_subcategorias");

$sql = "SELECT *, sesu.titulo as tituloSubCategoria, seca.titulo as tituloCategoria, res.id as idReserva, sesu.descripcion as descripcionSubCategoria 
FROM reservas res 
LEFT JOIN servicios_subcategorias sesu ON res.id_servicio_subcategoria   = sesu.id
LEFT JOIN servicios_categorias seca ON res.id_servicio_categoria  = seca.id
LEFT JOIN clientes cli ON res.id_cliente = cli.id WHERE estado_reserva = 1
/* LEFT JOIN servicios_subcategorias sesu2 ON seca.id = sesu2.servicio_cat_id */";
$reservas = mysqli_query($conexion, $sql);

?>
<div>

    <div class="table-responsive mt-3 px-3">
        <table class="table table-sm table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>categoria</th>
                    <th>subCategoria</th>
                    <th>cliente</th>
                    <th>Num. personas </th>
                    <th>Fecha registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva) : ?>
                    <tr>
                        <td><?= $reserva["idReserva"] ?></td>
                        <td><?= $reserva["tituloCategoria"] ?></td>
                        <td><?= $reserva["tituloSubCategoria"] ?></td>
                        <td><?= $reserva["nombres"] ?></td>
                        <td><?= $reserva["num_personas"] ?></td>
                        <td><?= $reserva["fecha_registro"] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#updateModal" onclick="obtenerReserva('<?= $reserva['idReserva'] ?>')" class="btn btn-warning">Actualizar</a>
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
                    <form id="formServicioCatAct" onsubmit="actualizarReserva(this)">
                        <input type="hidden" name="id" id="idAct" data-validate>
                        <label for="">Servicio categoria</label>
                        <select name="id_servicio_categoria" id="id_servicio_categoriaAct" class="form-control mb-1">
                            <option value="" selected disabled>Seleccione...</option>
                            <?php foreach ($serviciosCat as $servicio) : ?>
                                <option value="<?= $servicio["id"] ?>"><?= $servicio["titulo"] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label for="">Servicio sub-categoria</label>
                        <select name="id_servicio_subcategoria" id="id_servicio_subcategoriaAct" class="form-control mb-1">
                            <option value="" selected disabled>Seleccione...</option>
                            <?php foreach ($serviciosSubCat as $servicio) : ?>
                                <option value="<?= $servicio["id"] ?>"><?= $servicio["titulo"] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label for="">Cliente</label>
                        <select name="id_cliente" id="id_clienteAct" class="form-control mb-1" data-validate>
                            <option value="" selected disabled>Seleccione...</option>
                            <?php foreach ($clientes as $cliente) : ?>
                                <option value="<?= $cliente["id"] ?>"><?= $cliente["nombres"] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label for="">Numero de personas</label>
                        <input type="number" class="form-control mb-1" name="num_personas" id="num_personasAct" data-validate>
                        <label for="">Fecha de reserva</label>
                        <input type="date" class="form-control mb-1" name="fecha_reserva" id="fecha_reservaAct" data-validate>
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