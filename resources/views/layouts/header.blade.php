<!DOCTYPE html>
<html>
<head>
    <title>M-Arts</title>

    {{-- logo --}}
    <link href = "img/logo.png" rel="icon" type="image/png">

    {{-- css files --}}
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    {{-- js files --}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {{-- livereload --}}
    @if ( Config::get('app.debug') )
    <script type="text/javascript">
        document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
    </script> 
    @endif
    {{-- meta --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <div class="row header-row">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><span class="danger">M-</span>Arts</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-left">
                        <li role="presentation">
                            <a href="#">Make order</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation">
                            <a href="#">Gallery</a>
                        </li>

                        <li role="presentation">
                            <a href="#">About</a>
                        </li>

                        <li role="presentation">
                            <a href="#">Contacts</a>
                        </li>

                        @if(!Sentinel::check())
                        <li role="presentation">
                            <a href="/register">Sign up</a>
                        </li>
                        <li role="presentation">
                            <a href="/login">Log in</a>
                        </li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, {{Sentinel::getUser()->first_name}} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Manage account</a></li>
                                <li><a href="#">Some other stuff</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Language<span class="caret"></span></a>
                            <ul class="dropdown-menu language-selector">
                                <li><a href="/ua"><img src="img/langs/ukraine.svg"> Укр</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/us"><img src="img/langs/united-states.svg"> US</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/ru"><img src="img/langs/russia.svg"> Ru</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

            </div> {{-- /.container-fluid --}}
        </nav>
    </div>