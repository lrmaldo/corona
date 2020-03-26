<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CasosCreateRequest;
use App\Http\Requests;
use Redirect; 

class DashboardController extends Controller
{
    //

    public function __construct(){
		$this->middleware('auth');
    }
    
    public function index()
    {
    
      $casos = \App\casos::All();
    return view('dashboard.index',compact('casos'));
    }


    public function login(){
		return view('auth/login');
	}


  public function create(){
    return view('casos/create');
  }


  public function store(Request $request){
    \App\casos::create([
			'region' => $request->input('region'),
			'lat' => $request->input('lat'),
			'long' =>$request->input('long'),
			'confirmados' =>$request->input('confirmados'),
      		'sospechosos'=> $request->input('sospechosos'),
      		'negativos'=> $request->input('negativos'),
			'recuperados'=> $request->input('recuperados'),
			'muertos' =>$request->input('muertos'),
		
    ]);
    return  Redirect::to('/dashboard');
  }

  public function edit($id)
	{
		$casos = \App\casos::find($id);
		return view('casos.edit',['registro' => $casos]);
		
		
		
  }
  

  public function update($id ,Request $request)
	{
		$registro = \App\casos::find($id);
		$registro->region = $request->region;
		$registro->lat =$request->lat;
		$registro->long =$request->long;
		$registro->confirmados =$request->confirmados;
		$registro->sospechosos =$request->sospechosos;
    $registro->recuperados =$request->recuperados;
    $registro->negativos =$request->negativos;
		$registro->muertos =$request->muertos;




		$registro->save();
		return  Redirect::to('/dashboard');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\casos::destroy($id);
		return  Redirect::to('/dashboard');
		//return $id;
	}
}
