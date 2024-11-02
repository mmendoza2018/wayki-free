<?php 

$conexion = mysqli_connect("localhost", "root", "", "waiky");
$servicios = mysqli_query($conexion, "SELECT * FROM servicios");

?>

<div class="col-sm-4 mx-auto card p-4">
    <h5 class="text-center">Agregar registros</h5>
    <form id="formServiciosAdd" onsubmit="agregarCategoriaServicio(this)">
        <label for="">Titulo</label>
        <input type="text" class="form-control mb-1" name="titulo" data-validate>
        <label for="">Servicio</label>
        <select name="servicio_id" id="" class="form-control mb-1" data-validate>
            <option value="" selected disabled>Seleccione...</option>
            <?php foreach ($servicios as $servicio) : ?>
                <option value="<?= $servicio["id"] ?>"><?= $servicio["descripcion"] ?></option>
            <?php endforeach ?>
        </select>
        <label for="">Descripcion</label>
        <textarea class="form-control mb-1" name="descripcion" id="" rows="3" data-validate></textarea>
        <label for="">Precio</label>
        <input type="number" class="form-control mb-1" name="precio" data-validate>
        <label for="">Cantidad maxima de personas</label>
        <input type="number" class="form-control mb-1" name="cantidad_max_personas" data-validate>
        <div class="text-right">
            <button type="submit" class="btn btn-success mt-2">Guardar</button>
        </div>
    </form>
</div>