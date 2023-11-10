@extends('layouts.app')
@section('title', 'Add new cake')
@section('content')
    <h1>Add new flavour</h1>
    <form method="POST" action="">
        @csrf
        <label for="cake_id">Cake's ID</label>
        <input type="text" name="cake_id">
        <label for="cake_name">Cake's name</label>
        <input type="text" name="cake_name">
        <label for="price">Price</label>
        <input type="text" name="price">
        <label for="note">Note</label>
        <input type="text" name="note">
        {{-- <label for="image">Cake's image</label>
        <input type="file" name="image"> --}}
        <label for="cake_type">Cake's type</label>
        <input type="text" name="cake_type">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity">
        <button type="submit">Add</button>
    </form>
@endsection