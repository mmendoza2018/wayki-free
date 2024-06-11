  <?php require_once("layouts/header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <!--------------------------------------------------------------- -->
        <!------------------------ main  ------------------------------>
        <!--------------------------------------------------------------- -->

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="cantidadServicios"></h3>

                <p>Cantidad de Servicios</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="cantidadClientes"></h3>

                <p>Cantidad de clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cantidadReservas"></h3>

                <p>cantidad de reservas</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="cantidadViajeros"></h3>

                <p>cantidad de viajeros</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row gap-4">
          <div class="col-sm-6 p-3  bg-white">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="col-sm-6 p-3 bg-white">
            <canvas id="reservasChart"></canvas>
          </div>
          <div class="col-sm-6 p-3 bg-white">
            <canvas id="reservasChart2"></canvas>
          </div>
        </div>

        <!--------------------------------------------------------------- -->
        <!------------------------ main  ------------------------------>
        <!--------------------------------------------------------------- -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Titulo</h5>
        <p>Contenido</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">

      </div>

    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/personalizado.js"></script>

  <script>
    function CargarContenido(contenedor, contenido) {
      $("." + contenedor).load(contenido);
    }

    /* data para los cards */

    const getCardsData = async () => {

      let res = await fetch("dataGraficas01.php");
      let data = await res.json();
      let {
        totalServicios,
        totalClientes,
        totalReservas,
        totalViajeros
      } = data;

      document.getElementById("cantidadServicios").textContent = totalServicios;
      document.getElementById("cantidadClientes").textContent = totalClientes;
      document.getElementById("cantidadReservas").textContent = totalReservas;
      document.getElementById("cantidadViajeros").textContent = totalViajeros;

    }

    const getChartsData = async () => {

      let res = await fetch("dataGraficas02.php");
      let data = await res.json();
      console.log('data :>> ', data);
      grafico01(data.graficoPastel.servicios, data.graficoPastel.data);
      grafico02(data.graficoBarras.dias, data.graficoBarras.data);
      grafico03(data.graficoBarrasPorMes.meses, data.graficoBarrasPorMes.data);

    }

    document.addEventListener("DOMContentLoaded", () => {

      getCardsData();
      getChartsData();

    })

    /* grafico 01 */

    const grafico01 = (servicios, dataServicios) => {

      // Obtener el contexto del canvas donde se dibujará el gráfico
      var ctx = document.getElementById('myPieChart').getContext('2d');

      // Configuración del gráfico de pastel
      var myPieChart = new Chart(ctx, {
        type: 'pie', // Tipo de gráfico
        data: {
          labels: servicios, // Etiquetas de las porciones
          datasets: [{
            label: 'Colores favoritos',
            data: dataServicios, // Datos de las porciones
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)', // Rojo
              'rgba(54, 162, 235, 0.2)', // Azul
              'rgba(255, 206, 86, 0.2)', // Amarillo
              'rgba(75, 192, 192, 0.2)', // Verde
              'rgba(153, 102, 255, 0.2)', // Púrpura
              'rgba(255, 159, 64, 0.2)' // Naranja
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)', // Rojo
              'rgba(54, 162, 235, 1)', // Azul
              'rgba(255, 206, 86, 1)', // Amarillo
              'rgba(75, 192, 192, 1)', // Verde
              'rgba(153, 102, 255, 1)', // Púrpura
              'rgba(255, 159, 64, 1)' // Naranja
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            tooltip: {
              enabled: true,
            }
          }
        }
      });

    }

    const grafico02 = (dias, dataDias) => {

      /* grafico 02 */

      const labels = dias
      const data = {
        labels: labels,
        datasets: [{
          label: 'Número de Reservas',
          data: dataDias,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      };

      // Configuración del gráfico
      const config = {
        type: 'bar',
        data: data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      // Renderizar el gráfico
      const reservasChart = new Chart(
        document.getElementById('reservasChart'),
        config
      );

    }

    const grafico03 = (meses, dataMeses) => {

      /* grafico 02 */

      const labels = meses
      const data = {
        labels: labels,
        datasets: [{
          label: 'Número de Reservas por mes',
          data: dataMeses,
          backgroundColor: 'rgb(255, 165, 0)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      };

      // Configuración del gráfico
      const config = {
        type: 'bar',
        data: data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      // Renderizar el gráfico
      const reservasChart = new Chart(
        document.getElementById('reservasChart2'),
        config
      );

    }
  </script>

  </body>

  </html>