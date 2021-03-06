@extends('layouts.dashboardIndex')
  @section('content')

  <style>
  .map-responsive{
      overflow:hidden;
      padding-bottom:56.25%;
      position:relative;
      height:0;
  }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn-SItPueeJksJgURjiGNpeHjhzCef9iM"></script>
<script>

mapa = {
 map : false,
 marker : false,

 initMap : function() {

 // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.

 mapa.map = new google.maps.Map(document.getElementById('mapa'), {
   center: {lat: 17.0829383, lng:  -96.7884567},
   scrollwheel: false,
   zoom: 7,
   zoomControl: true,
   rotateControl : false,
   mapTypeControl: true,
   streetViewControl: false,
 });

 // Creamos el marcador
 mapa.marker = new google.maps.Marker({
 position: {lat:17.0829383, lng: -96.7884567},
 
 draggable: true
 });

 // Le asignamos el mapa a los marcadores.
  mapa.marker.setMap(mapa.map);
  mapa.marker.addListener( 'dragend', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("lat").value = this.getPosition().lat();
        document.getElementById("long").value =  this.getPosition().lng();
      });

 },

// función que se ejecuta al pulsar el botón buscar dirección
getCoords : function()
{
  // Creamos el objeto geodecoder
 var geocoder = new google.maps.Geocoder();

 address = document.getElementById('search').value;
 document.getElementById("coordenadas").innerHTML='Coordenadas:   '+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
 if(address!='')
 {
  // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
 geocoder.geocode({ 'address': address}, function(results, status)
 {
   if (status == 'OK')
   {
// Mostramos las coordenadas obtenidas en el p con id coordenadas
   document.getElementById("coordenadas").innerHTML='Coordenadas:   '+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
// Posicionamos el marcador en las coordenadas obtenidas
   mapa.marker.setPosition(results[0].geometry.location);
// Centramos el mapa en las coordenadas obtenidas
   mapa.map.setCenter(mapa.marker.getPosition());
   agendaForm.showMapaEventForm();
   }
  });
 }
 }
}
</script>
 



  <div class="container-fluid">

  <h1 class="mt-4">Crear Caso</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Crear</li>
                        </ol>


                        
              <form  role="form" method="POST" action="{{ url('/dashboard/store') }}">
					  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Crear
                    </button>
                    <!--button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal"> <i class="far fa-trash-alt"></i>
                                                        Eliminar
                                                        </button-->
                  </div>
                </div>
             
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Region:*</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="region" value="" placeholder="Nombre de la region" >
                  </div>
                </div>
                <div class="map-responsive">
                <div id="mapa" style="width: 450px; height: 350px;"> </div>
                </div>

                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Latintud:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="text"  id="lat" class="form-control" name="lat"   >
                  </div>
                </div> 
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Longitud:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="text" id="long"  class="form-control" name="long"   >
                  </div>
                </div> 

                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Corfimados:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="confirmados"   >
                  </div>
                </div>  
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Sospechosos:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="sospechosos"   >
                  </div>
                </div>

                


                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Recuperados:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="recuperados"   >
                  </div>
                </div>

                  
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Negativos:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="negativos"   >
                  </div>
                </div>




                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Muertos*</label>
                  </div>
                  
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="muertos"   >
                  </div>
                </div>
                            


              




               
              
                
              



              
              </form>

  </div>





@endsection