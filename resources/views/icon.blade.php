@extends('layouts.default')
@section('content')

<icon-component :icon="{{ $icon }}" :formats="{{ json_encode($formats) }}"></icon-component>

@stop