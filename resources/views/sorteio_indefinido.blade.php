@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">Falha no Sorteio </h5>
            </div>
            <div class="card-body">
                <p>{{ $msg }}</p>
            </div>
            <div class="card-footer text-muted text-center">
                <span>
                    <a href="{{ url()->previous() }}"><button type="submit" class="btn btn-info" form="sorteio">Voltar</button></a>
                </span> 
            </div>
        </div>
    </div>
@endsection