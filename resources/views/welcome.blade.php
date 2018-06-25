<html>
    <head>
        <title>Coexperiences</title>
        
        {!! Html::style('assets/css/bootstrap.css') !!}
        <!--link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/Favicon.png">
        

        <style>

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato','OpenSansSemibold';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                margin-top: 40px;
                margin-bottom: 40px;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }

            .navbar {
                margin-bottom: 0px !important;
            }
            .navbar-default {
                padding-left: 65px;
                padding-right: 65px;
                border: 0px solid #fff !important;
                background-color: #fff;
            }

            .btn-primary{
                background-color: #47bbcc;
                border-color: #47bbcc;
                color: #fff;
                font-weight: bold;
                text-transform: uppercase;
            }

            .navbar-default .navbar-nav > li > a {
                color: #000;
                font-family: 'Lato','OpenSansSemibold';
                font-size: 13px;
                font-weight: bold;
                padding: 12px;
                text-transform: uppercase;
            }

            a.menu {
                padding-top: 27px !important;
            }

            a.menu:hover {
                color: #337ab7 !important;
            }

            .carousel-inner{
                height: 400px;
            }

            .col-md-12{
                margin-top: 10px;
            }

            .title-home{
                text-transform: uppercase;
                color: #000;
                font-weight: bold;
                font-size: 1.1em;
            }

            .activity{
                background: #F4F3EE;
                padding-top: 40px;
                padding-bottom: 80px;
            }

            h1{
                margin-bottom: 30px;
            }

            .footer{
                color: #F4F3EE;
                background: #000;
            }


        </style>
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>    
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        {!! Html::image('assets/images/logo.png', 'Coexperiences' ,array('width'=>'185px')) !!}
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="menu" href="{{ route('experience_index') }}" />
                        {{ trans("welcome.list_exp") }}
                    </a>
                </li>
                <li>
                    <a class="menu" href="{{ route('login') }}" />
                        {{ trans("welcome.login") }}
                    </a>
                </li>
                <li>
                    <a class="menu" href="{{ route('register') }}" />
                        {{ trans('welcome.singUp') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('welcome') }}" />
                        <button type="button" class="btn btn-primary navbar-btn">
                            {{ trans('welcome.find_exp') }}
                        </button>
                    </a>
                </li>
                <li style="margin-top: 15px;"><a href="{{ route('setLocale','es') }}"><img class="img-rounded" src={{ asset('assets/images/es.png') }} alt="Español"></a></li>
                <li style="margin-top: 15px;"><a href="{{ route('setLocale','en') }}"><img class="img-rounded" src={{ asset('assets/images/us.png') }} alt="English"></a></li>
            </ul>
          </div>
        </nav>

        <div clas="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  {!! Html::image('assets/images/carousel_01.jpeg', 'Coexperiences' ,array('heigth'=>'400px', 'width'=>'100%')) !!}
                </div>

                <div class="item">
                  {!! Html::image('assets/images/carousel_02.jpg', 'Coexperiences' ,array('heigth'=>'400px', 'width'=>'100%')) !!}
                </div>

                <div class="item">
                  {!! Html::image('assets/images/carousel_03.jpg', 'Coexperiences' ,array('heigth'=>'400px', 'width'=>'100%')) !!}
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="sr-only">Next</span>
              </a>
            </div>

            <div class="content container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::image('assets/images/maleta.png', 'Find & Reserve' ,array('width'=>'80px')) !!}
                            </div>
                            <div class="col-md-12 title-home">
                                FIND AND RESERVE YOUR EXPERIENCES
                            </div>
                            <div class="col-md-12">
                                <p>Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::image('assets/images/global.png', 'Colombia & Caribbean' ,array('width'=>'80px')) !!}
                            </div>
                            <div class="col-md-12 title-home">
                                SPECIALIZED IN COLOMBIA AND THE CARIBBEAN
                            </div>
                            <div class="col-md-12">
                                <p>Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::image('assets/images/usuarios.png', 'Users' ,array('width'=>'80px')) !!}
                            </div>
                            <div class="col-md-12 title-home">
                                LIVE EXPERIENCES AT THE BEST PRICE
                            </div>
                            <div class="col-md-12">
                                <p>Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::image('assets/images/bloquear.png', 'Safety' ,array('width'=>'80px')) !!}
                            </div>
                            <div class="col-md-12 title-home">
                                TRUST AND SAFETY
                            </div>
                            <div class="col-md-12">
                                <p>Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>

            
            

            <div class="activity content container-fluid">
                <h1>Best Activities And Tours Of Colombia</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                {!! Html::image('assets/images/maleta.png', 'Find & Reserve' ,array('width'=>'80px')) !!}
                            </div>
                            <div class="col-md-10 col-md-offset-2 title-home">
                                FIND AND RESERVE YOUR EXPERIENCES
                            </div>
                            <div class="col-md-10 col-md-offset-2">
                                <p>Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                {!! Html::image('assets/images/global.png', 'Colombia & Caribbean' ,array('width'=>'80px')) !!}
                            </div>
                            <div class="col-md-10 col-md-offset-1 title-home">
                                SPECIALIZED IN COLOMBIA AND THE CARIBBEAN
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <p>Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-10">
                                {!! Html::image('assets/images/usuarios.png', 'Users' ,array('width'=>'80px')) !!}
                            </div>
                            <div class="col-md-10 title-home">
                                LIVE EXPERIENCES AT THE BEST PRICE
                            </div>
                            <div class="col-md-10">
                                <p>Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            



            <div class="footer">
                <br>
                <p style="text-align: center;">Footer</p>
                <br>
            </div>
        </div>

        <!-- Scripts -->
        {!! Html::script('assets/js/jquery.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}

    </body>
</html>
