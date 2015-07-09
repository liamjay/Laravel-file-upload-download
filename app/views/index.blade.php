<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Onecomponent</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

        {{ HTML::style('lib/bootstrap/dist/css/bootstrap.min.css') }}
        {{ HTML::style('lib/fontawesome/css/font-awesome.min.css') }}
        {{ HTML::style('lib/normalize.css/normalize.css') }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800') }}

        {{ HTML::script('lib/modernizr/modernizr.js') }}
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-dashboard-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ URL::to('/') }}">{{ HTML::image('img/one-component.png', 'Onecomponent Logo', array('style' => 'margin-top: -11px', 'width' => '250px')) }}</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-dashboard-navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ URL::to('/login/logout') }}"><i class="fa fa-sign-out"></i>&nbsp;Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container">
            @if (Auth::user()->name === 'Admin')
                {{ Form::open(array('url' => '/upload', 'class' => 'form-inline', 'files' => true, 'style' => 'margin: 0 0 20px 0;')) }}
                    <div class="form-group">
                        {{ Form::label('filename', 'Filename:') }}
                        {{ Form::text('filename', null, array('class' => 'form-control', 'placeholder' => 'Filename', 'style' => 'margin: 0 20px 0')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::file('file', '', array('class' => 'form-control', 'styles' => 'margin: 0 20px 0 0')) }}
                    </div>
        
                    <button type="submit" class="btn btn-primary">Upload</button>
                {{ Form::close() }}
            @endif

            <!-- If there are any errors, they will show here -->
            {{ HTML::ul($errors->all(), array('class' => 'alert alert-danger errors')) }}

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Filename</td>
                        <td>File URI</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $files as $key => $value)
                        <tr>
                            <td>{{ $value->filename }}</td>
                            <td>{{ $value->uri }}</td>
                            <td>
                                <a href="{{ $value->uri }}" class="btn btn-primary">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ HTML::script('lib/jquery/dist/jquery.min.js') }}
        {{ HTML::script('lib/bootstrap/dist/js/bootstrap.min.js') }}
    </body>
</html>