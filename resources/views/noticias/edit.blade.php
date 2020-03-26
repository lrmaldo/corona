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

 



  <div class="container-fluid">

  <h1 class="mt-4">Crear Caso</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/Noticias">Noticias</a></li>
                            <li class="breadcrumb-item active">Crear</li>
                        </ol>


                        
              <form  role="form" method="POST" enctype="multipart/form-data" action="{{ route('noticias.update', $registro->id) }}">
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
                  <label class="col-md-4 control-label">Titulo:*</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" id="titulo" class="form-control" name="titulo"  placeholder="Escribe el titulo de la noticia" value="{{ $registro->titulo }}" required>
                  </div>
                </div>
                

                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Resumen:*</label>
                  </div>
                  <div class="col-md-8">
                  <textarea  id="resumen"  rows="5" cols="50" class="form-control" name="resumen"  placeholder="Escribe un resume para la noticia en la app"  required> {{ $registro->resumen }}</textarea>
                  </div>
                </div> 
                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Imagen:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="file" id="url_imagen"  class="form-control" name="url_imagen"   >
                  </div>
                </div> 

                <div class="form-group">
                <div class="input-group-prepend">
                  <label class="col-md-4 control-label">Url Noticias:*</label>
                  </div>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="url_noticia" value="{{ $registro->url_noticia }}" required  >
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
                                                                                ¿Esta seguro que desea eliminar esta noticia?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                                <form class="form-horizontal" role="form" method="post" action="{{ url('/noticias/destroy/' . $registro->id ) }}">
                                                                                <input type="hidden" name="_method" value="DELETE">
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <input class="btn btn-danger btn-xs" type="submit" value="Delete" />
                                                                            
                                                                            </form>
                                                                                
                                                                                
                                                                            </div>
                                                                            </div>
                                                      


@endsection