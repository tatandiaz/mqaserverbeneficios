<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Taller;
use Carbon\Carbon;
use Image;


class TalleresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   //Taller:: all ()-->Se consultan todos los talleres de la tabla y se envian a la vista.
    $data = Taller::where('id','>',0)->get();
    return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('talleres.crear_taller');
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


      $this->validate($request, [
            'imagentaller' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'nombretaller'=>'required|max:128'
        ]);


        $imagen=$request->file('imagentaller');
        $filename=time().'.'.$imagen->getClientOriginalExtension();
        Image::make($imagen)->save(public_path('/imagenes_talleres/'.$filename));


        //Se guardan Los Parametros
        $taller=new Taller();
        $taller->nombre=$request->nombretaller;
        $taller->fecha=Carbon::now();
        $taller->titulo=$request->nombretaller;
        $taller->rutaimagen=$filename;
        $taller->save();



            return redirect()->action('TalleresController@index');

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
