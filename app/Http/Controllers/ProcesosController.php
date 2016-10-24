<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Taller;
use App\Mesa;
use App\Proceso;
use Carbon\Carbon;
use Image;


class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   //Taller:: all ()-->Se consultan todos los talleres de la tabla y se envian a la vista.
        $data=\DB::select("select procesos.id as id,procesos.proceso as proceso,
                                (SELECT SUBSTRING_INDEX(REPLACE(sugerencia,'PUNTOS DE DOLOR:  ',''), 'BENEFICIOS:',1)) as puntos,(SELECT SUBSTRING_INDEX(sugerencia, ':',-1) ) as beneficios,talleres.nombre as taller,mesas.nombre as mesa,categorias.nombre 
                                            as categoria,categorias.color as color
                                              from procesos
                                            inner join talleres on procesos.talleres_id=talleres.id
                                            inner join mesas on procesos.mesas_id=mesas.id and mesas.talleres_id=talleres.id
                                            inner join categorias on procesos.categorias_id=categorias.id order by mesas.nombre desc ");


           return view('procesos.procesos',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Taller::where('id','>',0)->get();
        return view('procesos.crear_procesos',compact('data'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //Se guardan Los Parametros
        $proceso=new Proceso();
        $proceso->proceso=$request->nombreproceso;
        $proceso->sugerencia='';
        $proceso->fecha=Carbon::now();
        $proceso->mesas_id=$request->mesa;
        $proceso->categorias_id=0;
        $proceso->talleres_id=$request->taller;
        $proceso->responsables_id=0;
        $proceso->save();



            return redirect()->action('ProcesosController@index');

    }
        public function listmesas(Request $request,$id)
    {
        if($request->ajax()){

            $mesas = Mesa::where('talleres_id','=',$id)->get();
           return response()->json($mesas);

        }

   
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
        //
    }
}
