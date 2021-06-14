@extends('layouts.app')

@section('content')
    <div class="container">
        <edit-component csrf_token="{{ @csrf_token() }}" 
                    jogador-selecionado="{{ $jogadorSelecionado }}" 
                    dir="{{ Request::url() }}" 
                    path="{{ Request::path() }}">
        </edit-component>
    </div>
@endsection