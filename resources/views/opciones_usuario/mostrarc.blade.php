@extends('template.master')
@section('contenido_central')
<h1 align="center">Listado de citas</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table id="tabla1" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>tipo de cita</th>
                    <th>Doctor</th>
                    <th>Cliente</th>
                    <th>fecha</th>
                    <th>hora</th>
                    <th>total</th>
                    <th>status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($citas as $cita)
                <tr>
                    <td>{!! $cita->id !!}</td>
                    <td>{!! $cita->tipo_cita !!}</td>
                    <td>{!! $cita->doctores->nombres !!}</td>
                    <td>{!! $cita->clientes->nombres !!}</td>
                    <td>{!! $cita->fecha !!}</td>
                    <td>{!! $cita->hora !!}</td>
                    <td>${!! $cita->total !!}</td>
                    <td>
                        <?php 
                            if($cita->status == 1){
                                echo("Pendiente");
                            }else if($cita->status == 0){
                                echo("Finalizada");
                            }else{
                                echo("Cancelada");
                            }
                        ?>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <br />
            <br />
            <a href="{!! asset('opcionesusuario') !!}" class="btn btn-primary btn-block">Regresar a opciones de admin</a>
        </div>
    </div>
</div>
@endsection()