<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/cart.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>

    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token()
      ]) !!};

  </script>

</head>
<body>

    <div id="app">

        <cart-component></cart-component>

    </div>

<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

</body>
</html>