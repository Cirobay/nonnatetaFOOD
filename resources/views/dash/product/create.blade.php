@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>

        </div>
    </div>
@stop

@section('content')
    <form action="{{ route('dash.products.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome Prodotto:</strong>
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantità:</strong>
                    <input type="number" name="quantity" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome Prodotto:</strong>
                    <input type="number" step="any" name="price" class="form-control" placeholder="">
                </div>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dash.products.index') }}"> Back</a>
            </div>
            <div class="  col-md-8  float-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            @endforeach
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $error }}',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            </script>
    @endif
@stop
