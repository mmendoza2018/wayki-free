<div class="col-sm-4 mx-auto card p-4">
    <h5 class="text-center">Agregar registros</h5>
    <form id="formClientesAdd" onsubmit="agregarCliente(this)">
        <label for="">Nombres</label>
        <input type="text" class="form-control mb-1" name="nombres" data-validate>
        <label for="">Correo</label>
        <input type="text" class="form-control mb-1" name="correo" data-validate>
        <label for="">Celular</label>
        <input type="text" class="form-control mb-1" name="celular" data-validate>
        <div class="text-right">
            <button type="submit" class="btn btn-success mt-2">Guardar</button>
        </div>
    </form>
</div>