@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')


  <div class="container spark-screen">
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="font-weight: bold;">Administrador de Procesos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

             <div class="col-md-6" style="position: relative;left: 280px">  
            <p class="login-box-msg" style="font-size: 50px">Nuevo Proceso</p>

          <form action="{{ url('/procesos/guardarproceso') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control input-lg " placeholder="Nombre Del Proceso" name="nombreproceso" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
              <div class="form-group has-feedback">
                      <select class="form-control" style="height: 45px;font-size: 18px" name="taller" id="taller">
                   <option value="0">Seleccione..</option>

                  @foreach($data as $row)
                    <option value="{{$row->id}}">{{$row->nombre}}</option>
                   @endforeach

                  </select>
                </div>
                   <div class="form-group has-feedback">
                      <select class="form-control" style="height: 45px;font-size: 18px" name="mesa" id="mesa" disabled="true">
                    <option value="0">Seleccione..</option>

                  </select>
                </div>
              
                <div class="row">
                 
               
                    <div class="col-xs-4 col-xs-push-1">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" style="position: relative; left: 150px">Crear</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div>
      </div>
      
        <!-- /.box-body -->
     
      </div>
  </div>

@endsection

