@extends('layouts.dashboardIndex')
  @section('content')
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

                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Latintud:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="text"  class="form-control" name="lat"   >
                  </div>
                </div> 
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Longitud:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="text"  class="form-control" name="long"   >
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