<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\noticias;
use App\Http\Requests;
use Redirect;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = noticias::All();
        return view('noticias.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       /**  $this->validate($request, [
       *     'url_imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      *  ]);
    */

       if ($request->hasFile('url_imagen')) {

      

            $image = $request->file('url_imagen');
            $name = 'imagen'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/imagenes');
            $image->move($destinationPath, $name);

            noticias::create([
                'titulo' => $request->input('titulo'),
                'resumen' => $request->input('resumen'),
                'url_noticia' =>$request->input('url_noticia'),
                'url_imagen' =>$request->root().'/imagenes'.'/'.$name,
                
            
        ]);
            
                //return noticias::All();
                return  Redirect::to('/noticias');
        }

       // return $request->root();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticias = noticias::find($id);
		return view('noticias.edit',['registro' => $noticias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->url_imagen){
            
            if ($request->hasFile('url_imagen')) {

      

                $image = $request->file('url_imagen');
                $name = 'imagen'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/imagenes');
                $image->move($destinationPath, $name);
                
                 $registro = noticias::find($id);
		         $registro->titulo = $request->titulo;
                 $registro->resumen =$request->resumen;
                 $registro->url_noticia =$request->url_noticia;
		         $registro->url_imagen =$request->root().'/imagenes'.'/'.$name;
                
	        	$registro->save();
                    //return noticias::All();
                    return  Redirect::to('/noticias');
            }


        }else{
            $registro = noticias::find($id);
		    $registro->titulo = $request->titulo;
	    	$registro->resumen =$request->resumen;
		    $registro->url_noticia =$request->url_noticia;
		    
		    $registro->save();
        }



        return  Redirect::to('/noticias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        noticias::destroy($id);
		return  Redirect::to('/noticias');
		//return $id;
    }
}
