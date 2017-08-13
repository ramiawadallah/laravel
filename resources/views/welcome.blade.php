<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ trans('main.logo')}}</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="public/css/frontend/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">{{ trans('main.logo')}}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
                    @if (Auth::check())
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
            @endif
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Language <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $key => $value)
                        <li>
                            <a rel="alternate" hreflang="{{ $key }}" href="{{ LaravelLocalization::getLocalizedURL($key) }}">
                                {{ $value['native'] }}
                            </a>
                        </li>                                    
                     @endforeach
                </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


    <div class="container">

        <!-- Start Form Col -->
        <div class="col-xs-5">
            <form action="{{ url('/newpost') }}" method="post">
                    {{ csrf_field() }}

                    {!! BuildFields('title', null, 'text', ['id'=>'name', 'data-id' => '10']) !!}
                    <br>
                    {!! BuildFields('body', null, 'textarea', ['id'=>'name', 'data-id' => '10', 'rows'=>'10']) !!}
                    <br>
                    <input style="background-color: #26CAD3 !important; border: 1px solid #26CAD3;" type="submit" name="btn" class="btn-block btn-lg btn-danger">

            </form>  
        </div>
        <!-- End Form Col -->

        <!-- Start Post Col -->
        <div class="col-xs-7">
            @foreach($posts as $post)
                <h2 style="color: #FFD923;">{{ unserialize($post['title'])[LaravelLocalization::getCurrentLocale()] }}</h2>
                <p>{{ unserialize($post['body'])[LaravelLocalization::getCurrentLocale()] }}</p>
                <hr>
            @endforeach()
        </div>
        <!-- End Post Col -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.js"></script>
  </body>
</html>