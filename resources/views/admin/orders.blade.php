@extends('layouts.artisan.master')

@section('content')

<orders-component orders="{{ json_encode($orders) }}" ></orders-component>

@endsection