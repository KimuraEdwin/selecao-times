@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <span>
                    <a href="{{ url()->previous() }}"><button type="submit" class="btn btn-info text-white" form="sorteio">Voltar</button></a>
                </span> 
            </div>
        </div>
        <div class="row">
            @for( $i = 0 ; $i < count($times); $i++)
                <div class="col-sm-6">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title">Time {{ $i+1 }}</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @for($b = 0; $b < count($times[$i]); $b++)
                                    @foreach($times[$i][$b] as $jogador)
                                        <li class="list-group-item w-100 {{ $b == 0 ? 'bg-success text-white' : '' }}">
                                            {{ $jogador }} <span class='float-right'>{{ $b == 0 ? 'Goleiro' : '' }}</span>
                                        </li>
                                    @endforeach
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection