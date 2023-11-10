@extends('layouts.app')
@section('title', $title . ' - Macadonuts')
@section('content')
    <h1>{{ $cake['cake_name'] }}</h1>
    <h2>Price: {{ $cake['price'] }}</h2>
    <h3>{{ $cake['note'] }}</h3>
    <img src="{{ url('/public/storage/image/'. $cake['image']) }}" alt="{{ $cake['cake_name'] }}">
    @auth
        @if (auth()->user()->user_role == 1)
            <a href="/cakes/{{ $cake['cake_name'] }}/edit"><button type="button">Edit information</button></a>
        @endif
    @endauth
@endsection