<?php
require_once "../includes/_db.php";

?>

<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        <?php
        $SQL = "SELECT * FROM user";
        $consulta = mysqli_query($conexion, $SQL);
        while ($resultado = mysqli_fetch_assoc($consulta)) {
          echo "['" . $resultado['nombre'] . "', " . $resultado['rol'] . "],";
        }

        ?>
      ]);

      var options = {
        title: 'Reporte de clientes'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

</head>

<body>
  <div id="piechart" style="width: 700px; height: 500px;"></div>
  <!--div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
          <h2>Reporte de Reservas</h2>
          
      </div>
      <div class="col-md-4">
        <div class="bg-success text-white text-center m-1">
          <div class="card-header">TOTAL</div>
          <div class="card-body">
          <h5 class="h1 card-title"><span id="idVendidos">35</span></h5>
            <p class="card-text">CLIENTES</p>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-warning text-white text-center m-1">
          <div class="card-header">TOTAL</div>
          <div class="card-body">
            <h5 class="h1 card-title"><span id="idAlmacen">35</span></h5>
            <p class="card-text">SERVICIOS</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-info text-white text-center m-1">
          <div class="card-header">TOTAL</div>
          <div class="card-body">
            <h5 class="h1 card-title"><span id="idIngreso">35</span></h5>
            <p class="card-text">RESERVAS</p>
          </div>
        </div>
      </div>
    </div>

  </div-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</body>

</html>