@extends('template.master')
@section('contenido_central')
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            @foreach($especialidades as $especialidad)
                <a href="{!! 'mostardoctores/'.$especialidad->id !!}" class="btn btn-primary btn-block">
                    {!! $especialidad->nombre !!}
                </a>
                <br />
            @endforeach
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<br />
@endsection()