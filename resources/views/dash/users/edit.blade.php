@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Modifica Utenti</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')  }}</strong>
</div>

@endif


<div class="card">
    <div class="card-body">
        <p class="h5">Nome:</p>
        <p class="form-control">{{ $user->name }}</p>

        <h2 class="h5">Lista Dei Ruoli</h2>
        {!! Form::model($user, ['route' => ['dash.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach

                {!! Form::submit('Assegnare Ruolo', ['class' => 'btn btn-primary mt-2 float-right']) !!}
        {!! Form::close() !!}

    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
