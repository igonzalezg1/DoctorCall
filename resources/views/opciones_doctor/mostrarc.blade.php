@extends('template.master')
@section('contenido_central')
<h1 align="center">Listado de citas</h1>
<div class="container-fluid">
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
                    <th>Cambiar estados</th>
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
                    <td>
                        <a href="{!! 'concluir/'.$cita->id !!}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                            </svg> Cocluir
                        </a>

                        <a href="{!! 'cancelar/'.$cita->id !!}" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg> Cancelar
                        </a>
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