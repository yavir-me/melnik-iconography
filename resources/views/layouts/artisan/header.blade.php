<!DOCTYPE html>
<html>

<head>

  <title>Melnik Iconography</title>

{{-- Responsive favicon --}}
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/manifest.json">
<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#8b0000">
<meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/vendor.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app-admin.css') }}">

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