@extends('layouts.artisan.master')

@section('content')

<icon-component path=" {{ json_encode($path) }} " errors=" {{ json_encode($errors->all()) }} " icons=" {{ json_encode($icons) }} "></icon-component>

@endsection