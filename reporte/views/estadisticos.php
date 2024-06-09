    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gráficos Estadísticos de Reservas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="grafica2.php">Dashboard</a></li>
                        <!--li class="breadcrumb-item active">ChartJS</li-->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Grafico por Area</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Grafico de lineas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <script>
        $(document).ready(function() {

            $.ajax({
                url:"../ajax/procesos.ajax.php",
                method:"GET",
                success: function(respuesta){
                    var data = JSON.parse(respuesta);
                    var fecha_res = [];
                    var cant_p = [];
                    for(let index = 0; index < data.length; index++){
                        fecha_res.push(data[index][1]);
                        cant_p.push(data[index][0]);
                    }

                    //--------------
                    //- AREA CHART -
                    //--------------

                    // Get context with jQuery - using jQuery's .get() method.
                    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

                    var areaChartData = {
                        labels: fecha_res,
                        datasets: [{
                                label: 'Digital Goods',
                                backgroundColor: 'rgba(60,141,188,0.9)',
                                borderColor: 'rgba(60,141,188,0.8)',
                                pointRadius: false,
                                pointColor: '#3b8bba',
                                pointStrokeColor: 'rgba(60,141,188,1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data: cant_p
                            }
                        ]
                    }

                    var areaChartOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                        events:false,
                        tooltips:{
                            enabled:false
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                ticks:{
                                    fontColor: '#000'
                                },
                                gridLines: {
                                    display: false,
                                    color: '#000',
                                    drawBorder: false
                                }
                            }],
                            yAxes: [{
                                ticks:{
                                    stepSize:1,
                                    fontColor: '#000'
                                },
                                gridLines: {
                                    display: true,
                                    color: '#7DCEA0',
                                    drawBorder: false
                                }
                            }]
                        },
                        animation:{
                                duration:1,
                                onComplete:function(){
                                    var chartInstance = this.chart,
                                    ctx = chartInstance.ctx;
                                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontSize);
                                    ctx.fillStyle = "#efefef";
                                    ctx.textAlign = "center";
                                    ctx.textBaseLine = "bottom";
                                    this.data.datasets.forEach(function (dataset,i){
                                        var meta = chartInstance.controller.getDatasetMeta(i);
                                        meta.data.forEach(function(bar,index){
                                            var data = dataset.data[index];
                                            ctx.fillText(data,bar._model.x,bar._model.y - 5);
                                        });
                                    });
                                }
                        }

                    }

                    // This will get the first returned node in the jQuery collection.
                    new Chart(areaChartCanvas, {
                        type: 'line',
                        data: areaChartData,
                        options: areaChartOptions
                    })

                    //-------------
                    //- LINE CHART -
                    //--------------
                    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                    var lineChartOptions = $.extend(true, {}, areaChartOptions)
                    var lineChartData = $.extend(true, {}, areaChartData)
                    lineChartData.datasets[0].fill = false;

                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                        type: 'line',
                        data: lineChartData,
                        options: lineChartOptions
                    })

                }

            })

                


        })
    </script>