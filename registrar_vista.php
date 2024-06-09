<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Clientes 2</title>

    <!--link rel="stylesheet" href="estilos.css"-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<script type="text/javascript">
    function ConfirmRegistro() {
        var rpta = confirm("Seguro que deseas reservar");
        if (rpta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "waiky");

    $sqlCategorias = "SELECT * FROM servicios_categorias";
    $sqlSubCategorias = "SELECT * FROM servicios_subcategorias";
    $idCategoria = null;


    $responseCategorias = mysqli_query($conexion, $sqlCategorias) or die("Error");
    $responseSubCategorias = mysqli_query($conexion, $sqlSubCategorias) or die("Error");

    $destino_id = @$_GET["destino_id"];
    $tipo_destino = @$_GET["tipo_destino"];
    $servicio_cat_id = @$_GET["servicio_cat_id"];

    if ($tipo_destino === "SUBCATEGORIA") {
        $sqlCategoriaId = "SELECT * FROM servicios_subcategorias WHERE id = $destino_id";
        $responseIdCategoria = mysqli_query($conexion, $sqlCategoriaId) or die("Error");
        $idCategoria = mysqli_fetch_assoc($responseIdCategoria)["servicio_cat_id"];
    }
    ?>
    <div class="container pt-3">
        <h1 style="text-align: center;">Reserva de Clientes</h1>

        <form class="row g-3" id="formAddReserva" onsubmit="enviarReserva()">
            <div class="col-md-4">
                <label for="nombres" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombres" required>
            </div>
            <div class="col-md-4">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" required>
            </div>
            <div class="col-md-4">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="col-md-4">
                <label for="servicio" class="form-label">Servicio</label>
                <select id="servicioSelect" class="form-select" name="servicio" required>
                    <option selected value="">Selecciona...</option>
                    <?php foreach ($responseCategorias as $categoria) : ?>
                        <option value="<?= $categoria["id"] ?>"><?= $categoria["titulo"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-md-4" id="containerSubServicio">
                <label for="servicio" class="form-label">Sub Servicio</label>
                <select id="subServicioSelect" class="form-select" name="subServicio" required>
                    <option selected value="">Selecciona...</option>
                    <?php foreach ($responseSubCategorias as $subCategoria) : ?>
                        <option value="<?= $subCategoria["id"] ?>"><?= $subCategoria["titulo"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="cant_pers" class="form-label">Nro de personas a reservar</label>
                <input type="number" class="form-control" id="cant_pers" name="cant_pers" required>
            </div>
            <div class="col-4">
                <label for="fecha_reserva" class="form-label">Fecha de Reserva</label>
                <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
            </div>

            <div class="col-12">
                <!--div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                Revisar
                </label>
            </div-->
            </div>
            <div class="col-12">
                <!--input type="submit" value="Reservar" id="register" class="btn btn-success" name="registrar" -->
                <button type="submit" class="btn btn-success" name="registrar">
                    Reservar
                </button>
                <!--button  onclick="return ConfirmRegistro()">
                    <a href="index.php" class="boton-redireccion">Reservar</a>
                <input type="submit" value="Reservar" href="index.php">
                </button-->

            </div>
        </form>
        <?php
        include("reg.php");
        ?>

    </div>
    <script>
        let categoria = null;
        let subCategoria = null;
        let tipoServicio = '<?php echo $tipo_destino ?>';
        let servicioSelect = document.getElementById("servicioSelect");

        if (tipoServicio === "SUBCATEGORIA") {
            subCategoria = true;

            document.getElementById("servicioSelect").value = '<?= $idCategoria ?>';
            document.getElementById("servicioSelect").setAttribute("disabled", "");
            document.getElementById("subServicioSelect").value = '<?= $destino_id ?>';

        } else {
            categoria = true;
            document.getElementById("containerSubServicio").remove();
            //agregar el value en el select
            //ocultar el campo del select subcategoria

        }


        const enviarReserva = async () => {
            event.preventDefault();
            let form = document.getElementById("formAddReserva");
            let data = new FormData(form);
            data.append("registrar", "true")

            let res = await fetch("reg.php", {
                method: "POST",
                body: data
            });
            let response = await res.json();

            if (response[0]) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: response[1],
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 500);
            } else {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: response[1],
                    showConfirmButton: false,
                    timer: 1500
                });
            }

        }
    </script>
</body>

</html>