@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary float-right" href="{{ route('dash.home') }}"> Back</a>
            </div>
        </div>
    </div>
@stop

@section('content')

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th> Comapny Name: </th>
            <th> Company Mail: </th>
            <th> Adress </th>
            <th> Kvk Number</th>
        </tr>
        <tr>

            <td>{{ $todo->id }}</td>
            <td>{{ $todo->todo }}</td>
            <td>{{ $todo->description }}</td>
        </tr>
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
