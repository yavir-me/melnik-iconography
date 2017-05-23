@extends('layouts.artisan.master')

@section('content')

<manage-galleries-component errors=" {{ json_encode($errors->all()) }} " galleries=" {{ $galleries }} "></manage-galleries-component>

@endsection