@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary float-right" href="{{ route('dash.clients.index') }}"> Back</a>
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

            <td>{{ $client->id }}</td>
            <td>{{ $client->company_name }}</td>
            <td>{{ $client->company_email }}</td>
            <td>{{ $client->company_adress }}</td>
            <td>{{ $client->company_kvk }}</td>
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
