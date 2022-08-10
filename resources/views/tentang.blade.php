@extends('layout.main')
@section('container')
    <h1>Halaman Tentang BBlog</h1>
    <h3>Nama : {{ $name }}</h3>
    <p>Email: {{ $email }}</p>
    <img src="{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">
@endsection
