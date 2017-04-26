<!DOCTYPE html>
<html>

<head>

  <title>M-Arts</title>

  <link href = "img/logo.png" rel="icon" type="image/png">

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/vendor.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <meta name="csrf-token" content="{{ csrf_token() }}">

<script>

    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token()
    ]) !!};

</script>


</head>

<body>

<div class="container">

  <div id="app">

    <nav-component></nav-component>

    <order-modal></order-modal>