<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Onecomponent | Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

        {{ HTML::style('lib/bootstrap/dist/css/bootstrap.min.css') }}
        {{ HTML::style('lib/fontawesome/css/font-awesome.min.css') }}
        {{ HTML::style('lib/normalize.css/normalize.css') }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800') }}
        {{ HTML::style('css/onecomponent.min.css') }}

        {{ HTML::script('lib/modernizr/modernizr.js') }}

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Login to continue to Onecomponent</h1>

                    <div class="account-wall">
                        {{ HTML::image('img/one-component.png', 'Onecomponent Logo', array('class' => 'login-img', 'width' => '300px')) }}

                        <!-- If there are any errors, they will show here -->
                        {{ HTML::ul($errors->all(), array('class' => 'alert alert-danger errors')) }}

                        {{ Form::open(array('url' => 'login/authenticate', 'class' => 'form-login')) }}
                            <div class="form-group">
                                {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Username')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password')) }}
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        
        {{ HTML::script('lib/jquery/dist/jquery.min.js') }}
        {{ HTML::script('lib/bootstrap/dist/js/bootstrap.min.js') }}
    </body>
</html>