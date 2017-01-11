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
    <script type="text/javascript" src="js/scripts.js"></script>
    @if ( Config::get('app.debug') )
    {{-- livereload --}}
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
                            <a href="#" data-toggle="modal" data-target="#make-order-modal"><i class="fa fa-pencil" aria-hidden="true"></i> Make order</a>
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
                                <li><a href="/ru"><img src="img/langs/russia.svg"> Рус</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

            </div> {{-- /.container-fluid --}}
        </nav>
        {{-- gratitude block for made order --}}
        <div class="alert alert-warning order-gratitude-block alert-dismissible hide" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Thank you for the order!</strong> I'll contact you soon.
        </div>

    </div>

    <!-- Order modal -->
    <div class="modal fade" id="make-order-modal" tabindex="-1" role="dialog" aria-labelledby="order-label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="order-label">Order details</h4>
            </div>

            <div class="modal-body">
                <form action="/make-order" method="POST" class="form-horizontal" id="make-order-form">
                    {{csrf_field()}}

                    <div class="form-group" id="order-full-name">
                        <label for="full-name" class="col-sm-2 control-label">Full Name<span class="danger">*</span></label>
                        <div class="col-sm-10">
                          <input type="text" name="full-name" class="form-control" id="full-name" placeholder="Full Name" required>
                          <strong class="danger" id="order-errors-full-name"></strong></span>
                      </div>
                  </div>

                  <div class="form-group" id="order-email">
                    <label for="email" class="col-sm-2 control-label">Email<span class="danger">*</span></label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                      <strong class="danger" id="order-errors-email"></strong></span>
                  </div>
              </div>

              <div class="form-group" id="order-phone">
                <label for="phone" class="col-sm-2 control-label">Phone<span class="danger">*</span></label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                  <strong class="danger" id="order-errors-phone"></strong></span>
              </div>
          </div>

          <div class="form-group" id="order-comment">
              <label for="comment" class="col-sm-2 control-label">Comment</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Comment"></textarea>
                <strong class="danger" id="order-errors-comment"></strong></span>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Make order</button>
    </div>
</form>

</div>
</div>
</div>