
@extends('layouts.dashboardIndex')
  @section('content')
  <div class="container-fluid">
                        <h1 class="mt-4">Estadísticas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Estadísticas</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">Gráficas de acuerdo a los datos de los regitros.</div>
                        </div>
                        <!--div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div-->
                        
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Gráfica de edades</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted" >Actualizado <div id=fecha></div></div>
                                </div>
                            
                        

                                <div class="card mb-8">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Gráfica de generos</div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Actualizado <div id="fecha2"></div></div>
                                </div>
                            
                    </div>




                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

                    <script>
                        var d = new Date();
                        document.getElementById("fecha").innerHTML = d;
                        document.getElementById("fecha2").innerHTML =d;
                        // Grafica de sexo en la tabla de registro
                            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                            Chart.defaults.global.defaultFontColor = '#292b2c';
                            var femenino = JSON.parse("{{ json_encode($femenino) }}"); 
                            var masculino = JSON.parse("{{ json_encode($masculino) }}"); 

                            // Grafica de pastel
                            var ctx = document.getElementById("myPieChart");
                            var myPieChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ["Hombre", "Mujeres" ],
                                datasets: [{
                                data: [masculino, femenino],
                                backgroundColor: ['#007bff', '#ff0080'],
                                }],
                            },
                            });



                            // Area Chart Example

/** 
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["68335", "	68374", "68360", "68300", "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5",  "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5", "Mar 5","Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
    datasets: [{
      label: "Por Código Postal",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
**/




/////***************Grafica de edades  */



var edad18_24 = JSON.parse("{{ json_encode($edad18_24) }}");
var edad25_30 = JSON.parse("{{ json_encode($edad25_30) }}");
var edad31_40 = JSON.parse("{{ json_encode($edad31_40) }}");
var edad41_60 = JSON.parse("{{ json_encode($edad41_60) }}");
var edad61_70 = JSON.parse("{{ json_encode($edad61_70) }}");
var edad71_80 = JSON.parse("{{ json_encode($edad71_80) }}");

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["18-24", "25-30", "31-40", "41-60", "61-70", "71-80"],
    datasets: [{
      label: "cantidad",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [edad18_24, edad25_30, edad31_40, edad41_60,edad61_70,edad71_80],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 300,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});





                    </script>


  @endsection