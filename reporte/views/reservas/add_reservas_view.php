<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");
$serviciosCat = mysqli_query($conexion, "SELECT * FROM servicios_categorias");
$clientes = mysqli_query($conexion, "SELECT * FROM clientes");
$serviciosSubCat = mysqli_query($conexion, "SELECT * FROM servicios_subcategorias");

?>

<div class="col-sm-5 mx-auto">
    <h5 class="text-center">Agregar registros</h5>
    <form id="formServiciosAdd" onsubmit="agregarReserva(this)">
        <label for="">Servicio categoria</label>
        <select name="id_servicio_categoria" class="form-control mb-1">
            <option value="" selected >Seleccione...</option>
            <?php foreach ($serviciosCat as $servicio) : ?>
                <option value="<?= $servicio["id"] ?>"><?= $servicio["titulo"] ?></option>
            <?php endforeach ?>
        </select>

        <label for="">Servicio sub-categoria</label>
        <select name="id_servicio_subcategoria" class="form-control mb-1">
            <option value="" selected >Seleccione...</option>
            <?php foreach ($serviciosSubCat as $servicio) : ?>
                <option value="<?= $servicio["id"] ?>"><?= $servicio["titulo"] ?></option>
            <?php endforeach ?>
        </select>

        <label for="">Cliente</label>
        <select name="id_cliente" class="form-control mb-1" data-validate>
            <option value="" selected disabled>Seleccione...</option>
            <?php foreach ($clientes as $cliente) : ?>
                <option value="<?= $cliente["id"] ?>"><?= $cliente["nombres"] ?></option>
            <?php endforeach ?>
        </select>

        <label for="">Numero de personas</label>
        <input type="number" class="form-control mb-1" name="num_personas" data-validate>
        <label for="">Fecha de reserva</label>
        <input type="date" class="form-control mb-1" name="fecha_reserva" data-validate>
        <div class="text-right">
            <button type="submit" class="btn btn-success mt-2">Guardar</button>
        </div>
    </form>
</div>