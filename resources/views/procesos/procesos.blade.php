@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

	<div class="container spark-screen">
		<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="font-weight: bold;">Administrador de Talleres</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
       
        <div class="box-body">

             <div class="col-sm-12">  
                          <button type="button" class="btn btn-block btn-primary" style="width: 160px " onClick="window.location.href='{{url('/procesos/crearproceso')}}'">Crear Nuevo Proceso </button> 
                          <br>
                          
             <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">

                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nombre del Proceso</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Puntos De Dolor</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Beneficios</th>
                 <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Mesa</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Categoria Actual</th>
                </tr>
                </thead>
            <tbody>
            @foreach($data as $row)
                 <tr role="row" class="odd">
                  <td class="sorting_1">{{$row->id}}</td>
                  <td>{{$row->proceso}}</td>
                   <td>{{$row->puntos}}</td>
                  <td>{{$row->beneficios}}</td>
                  <td>{{$row->mesa}}</td>
                  <td style="background-color:{{$row->color}}">{{$row->categoria}}</td>


                
                  </tr>
            @endforeach

                </tbody>
               

      </table>
        </div>
      </div>
      
        <!-- /.box-body -->
     
      </div>
	</div>
@endsection
