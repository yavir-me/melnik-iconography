@extends('layouts.artisan.master')

@section('content')

<h2 class="text-center"> {{ $gallery->name }} </h2>

<gallery-component storage="{{ storage_path() }}" gallery="{{ json_encode($gallery) }}" icons="{{ json_encode($gallery->icons) }}"></gallery-component>

@endsection