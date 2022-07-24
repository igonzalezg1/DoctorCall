@extends('template.master')
@section('contenido_central')
<h1 align="center">Listado de detalles de citas</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="detalles_citas/create" class="btn btn-primary btn-block">Crear un detalle de cita</a>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-12">
            <table id="tabla1" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detallescitas as $detallecita)
                <tr>
                    <td>{!! $detallecita->id !!}</td>
                    <td>{!! $detallecita->fecha !!}</td>
                    <td>{!! $detallecita->hora !!}</td>
                    <td>
                    {!! Form::open(['method'=>'DELETE' , 'url'=>'/detalles_citas/'.$detallecita->id]) !!}
                    <a href="{!! 'detalles_citas/'.$detallecita->id !!}" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg></a>
                    <a href="{!! 'detalles_citas/'.$detallecita->id.'/edit' !!}" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <br />
            <br />
            <a href="{!! asset('OpcionesAdmin') !!}" class="btn btn-primary btn-block">Regresar a opciones de admin</a>
        </div>
    </div>
</div>
@endsection()