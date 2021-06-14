@extends('layouts.app')

@section('content')
    <div class="container">
        <card-jogadores-component jogadores="{{ $jogadores }}" dir="{{ Request::url() }}" path="{{ Request::path() }}"></card-jogadores-component>
    </div>
@endsection