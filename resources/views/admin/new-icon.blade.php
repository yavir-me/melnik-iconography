@extends('layouts.artisan.master')

@section('content')

@if($errors->has('message'))
<span class="alert alert-success">
    {{$errors->get('message')[0]}}
</span>
@endif

<new-icon-component storage="{{ storage_path() }}" path="{{ $gallery }}"></new-icon-component>

@endsection