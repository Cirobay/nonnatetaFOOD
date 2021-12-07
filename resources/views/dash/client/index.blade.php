@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @can('dash.clients.create')
                <div class="pull-left">
                    <a class="btn btn-success float-right" href="{{ route('dash.clients.create') }}"> Crea Nuovo Cliente</a>
                </div>
            @endcan

        </div>
    </div>
@stop

@section('content')

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Company Mail</th>
            <th>Adress</th>
            <th>Kvk Number</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clients as $client)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $client->company_name }}</td>
                <td>{{ $client->company_email }}</td>
                <td>{{ $client->company_adress }}</td>
                <td>{{ $client->company_kvk }}</td>
                <td>
                    <form action="{{ route('dash.clients.destroy', $client->id) }}" method="POST">

                        @can('dash.clients.show')
                            <a class="btn btn-info" href="{{ route('dash.clients.show', $client->id) }}">Show</a>
                        @endcan


                        @can('dash.clients.edit')
                            <a class="btn btn-primary" href="{{ route('dash.clients.edit', $client->id) }}">Edit</a>
                        @endcan

                        @can('dash.clients.destroy')
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan

                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $clients->links() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
        </script>
    @endif
@stop
