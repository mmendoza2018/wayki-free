<?php
$conexion = mysqli_connect("localhost", "root", "", "waiky");
$clientes = mysqli_query($conexion, "SELECT * FROM clientes WHERE estado_cliente = 1");

?>

<div>

    <div class="table-responsive mt-3 px-3">
        <table class="table table-striped table-bordered" id="tablaCustom">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>fecha registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <td><?= $cliente["id"] ?></td>
                        <td><?= $cliente["nombres"] ?></td>
                        <td><?= $cliente["correo"] ?></td>
                        <td><?= $cliente["celular"] ?></td>
                        <td><?= $cliente["fecha_registro"] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#updateModal" onclick="obtenerClientes('<?= $cliente['id'] ?>')" class="btn btn-warning">Actualizar</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Actualizar registros</h5>
                    <form id="formClientesAct" onsubmit="actualizarCliente(this)">
                        <label for="">Nombres</label>
                        <input type="text" class="form-control mb-1" name="nombres" id="nombresAct" data-validate>
                        <input type="hidden" name="id" id="idAct" data-validate>
                        <label for="">Correo</label>
                        <input type="text" class="form-control mb-1" name="correo" id="correoAct" data-validate>
                        <label for="">Celular</label>
                        <input type="text" class="form-control mb-1" name="celular" id="celularAct" data-validate>
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

<script>
    $(document).ready(function() {
        $('#tablaCustom').DataTable();
    });
</script>