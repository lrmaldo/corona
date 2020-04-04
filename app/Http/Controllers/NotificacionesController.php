<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\notificaciones;
use App\base_noti;
use App\Components\FlashMessages;
use Redirect;
class NotificacionesController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $base_noti= base_noti::All();
        return view('notificacion.index',compact('base_noti'));
    }

    public function enviar()
    {
        $alerts = notificaciones::all();
        if(!$alerts->count()) {
            return response()->json(['code' => 400, 'message' => 'No tokens found.', 'status' => 'error'], 400);
        }
        /*
        curl -H "Content-Type: application/json" -X POST "https://exp.host/--/api/v2/push/send" -d '{
          "to": "ExponentPushToken[EZOVI7JGpy0ILZl-eQiXnM]",
          "title":"hello",
          "body": "world"
        }'
        ExponentPushToken[H3gJevJBNWbBdXVjFk9blC]

  $ch = \curl_init();

        \curl_setopt($ch, CURLOPT_URL, 'https://exp.host/--/api/v2/push/send');
        \curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'accept: application/json',
            'content-type: application/json',
        ]);
        \curl_setopt($ch, CURLOPT_POST, 1);
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $server_output = \curl_exec($ch);
        \curl_close($ch);

array( 'Accept: application/json','Accept-Encoding:gzip,deflate','Content-Type:application/json'));

  $data = array(
            'to'    => $token->expo_token,
            'title' => 'Mapa actualizado',
            'body'  => 'Hemos Actualizado el mapa de Oax de casos del COVID-19'
        );

          $data = [];
       foreach ($alerts as $token => $value){

        $data[] = ['to' => $value->expo_token,
                    'title'=> 'text',
                    'body'=> 'test',];
      
       }
       dd($data);
        */
        $result = [];
        $url = 'https://exp.host/--/api/v2/push/send';
        foreach ($alerts as $token){
        $data = array(
            'to'    => $token->expo_token,
            'title' => 'Mapa actualizado',
            'body'  => 'Hemos Actualizado el mapa de Oax de casos del COVID-19'
        );
      
    

        
       
        $headers = array(
            'Accept: application/json',
            'Accept-Encoding:gzip,deflate',
            'Content-Type:application/json'
          );
    
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          $result[] = curl_exec($ch);
          if ($result === FALSE) {
            die('Send Error: ' . curl_error($ch));
          }
          curl_close($ch);
          // $result;
        
    }

   
    return $result ;
      //  return response()->json(['code' => 200, 'tokens' => $data, 'status' => 'success'], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notificacion/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        notificaciones::firstOrCreate([
            'expo_token' => $request->expo_token
        ]);

        return response()->json(['code' => 200, 'message' => 'Token successfully stored!', 'status' => 'success'], 200);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        base_noti::Create([
            'titulo' => $request->titulo,
            'body'=> $request->body
        ]);

        $alerts = notificaciones::all();
        if(!$alerts->count()) {
            return response()->json(['code' => 400, 'message' => 'No tokens found.', 'status' => 'error'], 400);
        }
        
        $result = [];
        $url = 'https://exp.host/--/api/v2/push/send';
        foreach ($alerts as $token){
        $data = array(
            'to'    => $token->expo_token,
            'title' => $request->titulo,
            'body'  => $request->body
        );
      
    

        
       
        $headers = array(
            'Accept: application/json',
            'Accept-Encoding:gzip,deflate',
            'Content-Type:application/json'
          );
    
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          $result[] = curl_exec($ch);
          if ($result === FALSE) {
            die('Send Error: ' . curl_error($ch));
          }
          curl_close($ch);
          // $result;
        
    }
    return  Redirect::to('/notificaciones')->with('messages', 'Notificación enviada.');
    //return $result;

        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        base_noti::destroy($id);
		return  Redirect::to('/notificaciones');
    }
}
