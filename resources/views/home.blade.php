@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/information" class="btn btn-primary"> Desea registrar mas información </a>
                        <br>
                        <a href="" class="btn btn-success">Desea continuar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
