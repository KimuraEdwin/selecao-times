@extends('layouts.app')

@section('content')
    <div class="container">
        <card-presenca-component title="Lista de presença" 
                        csrf_token="{{ @csrf_token()}}"
                        jogadores="{{ $jogadores }}" 
                        dir="{{ Request::url() }}" 
                        path="{{ Request::path() }}">
        </card-presenca-component>
    </div>
@endsection