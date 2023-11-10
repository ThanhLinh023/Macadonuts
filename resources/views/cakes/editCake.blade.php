@extends('layouts.app')
@section('title', $title . ' - Macadonuts')
@section('content')
    <h1>Modify cake's information</h1>
    <form method="POST" action="">
        @csrf
        <label for="cake_id">Cake's ID</label>
        <input type="text" name="cake_id" value="{{ $cake['cake_id'] }}">
        <label for="cake_name">Cake's name</label>
        <input type="text" name="cake_name" value="{{ $cake['cake_name'] }}">
        <label for="price">Price</label>
        <input type="text" name="price" value="{{ $cake['price'] }}">
        <label for="note">Note</label>
        <input type="text" name="note" value="{{ $cake['note'] }}" size="50">
        {{-- <label for="image">Cake's image</label>
        <input type="file" name="image"> --}}
        <label for="cake_type">Cake's type</label>
        <input type="text" name="cake_type">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" value="{{ $cake['quantity'] }}">
        <button type="submit">Save</button>
    </form>
@endsection