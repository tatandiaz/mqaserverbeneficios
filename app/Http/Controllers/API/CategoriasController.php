<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Taller;
use App\Categoria;
use Carbon\Carbon;
use Image;


class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   //Taller:: all ()-->Se consultan todos los talleres de la tabla y se envian a la vista.
    $data =\DB::table('categorias')
            ->select('*')
            ->get();
           return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Taller::where('id','>',0)->get();
        return view('mesas.crear_mesa',compact('data'));
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
        $mesa=new Mesa();
        $mesa->nombre=$request->nombremesa;
        $mesa->visiblesugerencias=0;
        $mesa->talleres_id=$request->taller;
        $mesa->save();



            return redirect()->action('MesasController@index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data =\DB::table('mesas')
              ->join('talleres', 'mesas.talleres_id', '=', 'talleres.id')
              ->where('mesas.talleres_id',$id)
              ->select('mesas.id', 'mesas.nombre', 'talleres.nombre as taller','talleres.id as id_taller')
              ->get();
             return $data;
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
