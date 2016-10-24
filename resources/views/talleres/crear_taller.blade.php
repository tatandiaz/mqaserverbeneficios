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

             <div class="col-md-6" style="position: relative;left: 280px">  
            <p class="login-box-msg" style="font-size: 50px">Nuevo Taller</p>

          <form action="{{ url('/talleres/guardar') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control input-lg " placeholder="Nombre Del Taller" name="nombretaller" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="file" class="fform-control input-lg" placeholder="Imagen Cliente" name="imagentaller"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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

