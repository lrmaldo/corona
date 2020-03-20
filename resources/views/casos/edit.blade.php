@extends('layouts.dashboardIndex')
  @section('content')
  <div class="container-fluid">

  <h1 class="mt-4">Actualizar Caso</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Actualizar</li>
                        </ol>


                        
                        <form class="form-horizontal" role="form" method="post" action="{{ route('dashboard.update', $registro->id) }}">
                        <input type="hidden" name="_method" value="PUT">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Actualizar
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal"> <i class="far fa-trash-alt"></i>
                                                        Eliminar
                                                        </button>
                  </div>
                </div>
             
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Region:*</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="region" value="{{ $registro->region }}" placeholder="Nombre de la region" required>
                  </div>
                </div>

                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Latintud:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="text"  class="form-control" name="lat" value="{{ $registro->lat }}"  required>
                  </div>
                </div> 
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Longitud:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="text"  class="form-control" name="long" value="{{ $registro->long }}" required >
                  </div>
                </div> 

                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Corfimados:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="confirmados" value="{{ $registro->confirmados }}"  required >
                  </div>
                </div>  
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Sospechosos:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="sospechosos" value="{{ $registro->sospechosos }}"  required >
                  </div>
                </div>

                


                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Recuperados:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="number" min="0" max="999"  class="form-control" name="recuperados" value="{{ $registro->recuperados }}" required >
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
                  <input type="number" min="0" max="999"  class="form-control" name="muertos" value="{{ $registro->muertos }}" required >
                  </div>
                </div>
                            


              




               
              
                
              



              
              </form>

  </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                ¿Esta seguro que desea eliminar este usuario?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                                <form class="form-horizontal" role="form" method="post" action="{{ url('/dashboard/destroy/' . $registro->id ) }}">
                                                                                <input type="hidden" name="_method" value="DELETE">
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <input class="btn btn-danger btn-xs" type="submit" value="Delete" />
                                                                            
                                                                            </form>
                                                                                
                                                                                
                                                                            </div>
                                                                            </div>
                                                      


@endsection