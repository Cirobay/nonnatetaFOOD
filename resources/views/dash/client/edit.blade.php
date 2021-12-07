@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dash.clients.index') }}"> Back</a>
            </div>
        </div>
    </div>
@stop

@section('content')




    <form action="{{ route('dash.clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="company_name" value="{{ $client->company_name }}" class="form-control"
                        placeholder="Company Name:">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Mail:</strong>
                    <input type="text" name="company_email" value="{{ $client->company_email }}" class="form-control"
                        placeholder="Company Mail:">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adress:</strong>
                    <input type="text" name="company_adress" value="{{ $client->company_adress }}" class="form-control"
                        placeholder="Adress:">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telephone Number:</strong>
                    <input type="number" name="company_telephone" value="{{ $client->company_telephone }}"
                        class="form-control" placeholder="KTelephone Number:">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kvk Number:</strong>
                    <input type="number" name="company_kvk" value="{{ $client->company_kvk }}" class="form-control"
                        placeholder="Kvk Number:">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
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
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            </script>
    @endif
@stop
