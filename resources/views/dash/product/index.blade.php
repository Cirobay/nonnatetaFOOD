@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @can('dash.products.create')
                <div class="pull-right">
                    <a class="btn btn-success float-right" href="{{ route('dash.products.create') }}"> Create New Product</a>
                </div>
            @endcan

        </div>
    </div>
@stop

@section('content')



    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>Quantità</th>
            <th>Prezzo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('dash.products.destroy', $product->id) }}" method="POST">

                        @can('dash.products.show')
                            <a class="btn btn-info" href="{{ route('dash.products.show', $product->id) }}">Show</a>
                        @endcan


                        @can('dash.products.edit')
                            <a class="btn btn-primary" href="{{ route('dash.products.edit', $product->id) }}">Edit</a>
                        @endcan

                        @can('dash.products.destroy')
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan

                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire(
                'Good job!',
                'You added a product',
                'success'
            )
        </script>
    @else
    @endif


@stop
