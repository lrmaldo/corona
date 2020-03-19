
@extends('layouts.dashboardIndex')
  @section('content')

		

  
                        <!--div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Gráfica de asistencia</div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted"> <div id="demo"></div> </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                   
                                    <div class="card-body">
                                       
                                    </div>
                                    <div class="card-footer small text-muted"><div id="fecha2"></div></div>
                                </div>
                            </div>
                            
       
                        </div-->
  <script>
////**************para obtener la fecha y hora de la actualizacion de las  graficas */
 /**  var d = new Date();
document.getElementById("demo").innerHTML = d;
document.getElementById("fecha2").innerHTML =d;
  
    $(document).ready( function () {
    $('dataTable').DataTable();
} );
*/
    </script>   
                        <!-- tabla y botones para generr pdf y excel-->
                      <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Casos  
                             <a href="{{ url('dashboard/store/xlsx') }}"><button class="btn btn-success">Descargar en Excel xlsx</button></a>
                            <a href="{{ url('dashboard/store/pdf') }}"><button class="btn btn-success">Descargar en pdf</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Region</th>
                                                <th>Confirmados</th>
                                                <th>Sospechosos</th>
                                                <th>Recuperados</th>
                                                <th>Negativos</th>
                                                <th>Lat</th>
                                                <th>Log</th>
                                                
                                               
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        @foreach($casos as $registro)
                                            <tr>
                                                <td>{{$registro->id}}</td>
                                                <td>{{$registro->region}}</td>
                                                <td>{{$registro->confirmado}}</td>
                                                <td>{{$registro->sospechosos}}</td>
                                                <td>{{$registro->recuperados}}</td>
                                                <td>{{$registro->negativos}}</td>
                                                <td>{{$registro->lat}}</td>
                                                <td>{{$registro->long}}</td>
                                                
                                              
                                                <td> 
                                                <a href="{{ url('/dashboard/' . $registro->id . '/edit') }}" class="btn btn-info btn-xs"> Editar </a>
                                               
                                                
                                                        </td>



                                                                                                                                
                                                                      

                                                        
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>





          


           

</div>
</div>
 



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script>window.jQuery || document.write('<script src="/js/jquery-slim.min.js"><\/script>')</script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
feather.replace()
</script>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>



<script>
/** 
///// codigo js para generar la grafica pastel de asistencias del evento 

Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Asistió", "No asistio"],
    datasets: [{
      data: [asistio,noasistio],
      backgroundColor: ['#007bff', '#dc3545'],
    }],
  },
});
*/

        </script>







	@endsection