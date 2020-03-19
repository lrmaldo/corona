@extends('layouts.app')

@section('content')

				
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-signin" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<!--img class="mb-4" src="{{ asset('img/dime.jpg') }}" alt="" width="72" height="72"-->
      					<h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      
					
						<div class="form-group">
						<label class="col-md-4 control-label">Email</label>
							
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							
								<input type="password" class="form-control" name="password">
							
						</div>

						<div class="form-group">
							
								<!--div class="checkbox">
									<label>
										<input type="checkbox" name="remember">recuerdame
									</label>
								</div-->
							
						</div>

						<div class="form-group">
							
								<button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>

								
						
					</form>
@endsection
