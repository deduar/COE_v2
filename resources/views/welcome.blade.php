<html>
    <head>
        <title>Coexperiences</title>
        
        {!! Html::style('assets/css/bootstrap.css') !!}
        <!--link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/Favicon.png')}}">
        

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

            h1.activity {
                margin: 0px;
                padding: 0px;
                padding-bottom: 20px;
                text-align: center;
            }

            h1{
                margin-bottom: 30px;
                color: #000;
            }

            .footer{
                color: #F4F3EE;
                background: #000;
            }

            p.text_container{
                color: #000;
                font-size: 16px;
                font-weight: 330;
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
                    <a href="{{ route('experience_index') }}" />
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
                                {!! Html::image('assets/images/maleta.png', 'Find & Reserve' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px')) !!}
                            </div>
                            <div class="col-md-12 title-home" style="height: 60px;">
                                FIND AND RESERVE YOUR EXPERIENCES
                            </div>
                            <div class="col-md-12">
                                <p class="text_container">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::image('assets/images/global.png', 'Colombia & Caribbean' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px')) !!}
                            </div>
                            <div class="col-md-12 title-home" style="height: 60px;">
                                SPECIALIZED IN COLOMBIA AND THE CARIBBEAN
                            </div>
                            <div class="col-md-12">
                                <p class="text_container">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::image('assets/images/usuarios.png', 'Users' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px')) !!}
                            </div>
                            <div class="col-md-12 title-home" style="height: 60px;">
                                LIVE EXPERIENCES AT THE BEST PRICE
                            </div>
                            <div class="col-md-12">
                                <p class="text_container">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::image('assets/images/bloquear.png', 'Safety' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px')) !!}
                            </div>
                            <div class="col-md-12 title-home" style="height: 60px;">
                                TRUST AND SAFETY
                            </div>
                            <div class="col-md-12">
                                <p class="text_container">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>            

            <div class="activity container-fluid" style="color: #000; font-weight: normal;">
                <h1 class="activity">Best Activities And Tours Of Colombia</h1>
                @foreach($experiences as $exp)
                <div class="col-md-4" style="padding: 20px; margin: 10px; height: 410px; width: 31%; border: solid 1px #ebeae6; padding-bottom: 10px; background: #fff; ">
                  <a href="{{route('experience_show',array('id'=>$exp->exp_id))}}">
                    <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="180px;" width="100%;" style="display: block; margin-left: auto; margin-right: auto;">
                  </a>
                  <br>
                  <span style="padding-left: 30px;">{{ $exp->exp_name }}</span>
                  <hr>
                  <a href="{{ route('user_show',array('id'=>$exp->user_id)) }}">
                    <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="float: right; border-radius: 50%;">
                  </a>
                  {{ $exp->name }} {{ $exp->lastName }} <br>
                  {{ $exp->email }}
                  <span><br>{{ number_format($exp->exp_price, 2, '.', ',') }} {{ $exp->cur_simbol }} ({{ $exp->cur_name }})</span>
                  <span><br>{{ number_format($exp->exp_price/$exp->cur_exchange, 2, '.', ',') }} US$ (American Dollar)</span>
                  
                    <div>
                      <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
                    </div>              
                </div>
                @endforeach
                <div style="margin-top: 20px;" class="col-md-offset-5 col-md-2 btn btn-primary">LOAD MORE</div>    
            </div>

            <div style="margin-top: 30px; margin-bottom: 30px;">
                <div class="container-fluid" style="color:#000; font-weight: bold;">
                    <div class="col-md-6">
                        <div class="col-md-1 col-md-offset-1"><img src={{asset('assets/images/quote.png')}}></div>
                        <div class="col-md-6" style="margin-left: 20px;"><span>Exotic food, fantastic beaches and unbelievable hospitality. An unforgettable experience!</span></div>
                        <div class="col-md-1"><img src={{asset('uploads/avatars/default_avatar.png')}} width="80px" style="border-radius: 30px"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-1 col-md-offset-1"><img src={{asset('assets/images/quote.png')}}></div>
                        <div class="col-md-6" style="margin-left: 20px;"><span>Exotic food, fantastic beaches and unbelievable hospitality. An unforgettable experience!</span></div>
                        <div class="col-md-1"><img src={{asset('uploads/avatars/default_avatar.png')}} width="80px" style="border-radius: 30px"></div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 30px; margin-bottom: 0px;">
                <div class="container-fluid" style="color:#000; font-weight: bold; background: url(assets/images/colombia.png) no-repeat scroll 50% 0px #1e3039; height: 665px;">
                    <h1 style="color: #FFF; text-align: center; padding-top: 60px;">INSIDER GUIDES TO YOUR FAVORITE DESTINATIONS.</h1>
                    <div class="container-fluid">
                        <div style="color: #FFF;font-size: 18px;" class="col-md-2 col-md-offset-4">SAN ANDRÉS</div>
                        <div style="color: #FFF;font-size: 18px;" class="col-md-2 col-md-offset-1">SAN GIL</div>
                        <br>
                        <br>
                        <div style="color: #FFF;font-size: 18px;" class="col-md-2 col-md-offset-4">SALENTO</div>
                        <div style="color: #FFF;font-size: 18px;" class="col-md-2 col-md-offset-1">BARRANQUILLA</div>
                        <br>
                        <br>
                        <div style="color: #FFF;font-size: 18px;" class="col-md-2 col-md-offset-4">TAGANGA</div>
                        <div style="color: #FFF;font-size: 18px;" class="col-md-2 col-md-offset-1">BAHÏA SOLANO</div>
                    </div>
                </div>
            </div>

            <div class="footer" style="background-color: #000;">
                <div class="container-fluid" style="padding-top: 50px; padding-bottom: 10px;">
                    <div class="col-md-2 col-md-offset-2" style="color: #FFF; font-weight: normal; font-size: 11px; text-align: center;">ALL ABOUT USER-HOST</div>
                    <div class="col-md-2" style="color: #FFF; font-weight: normal; font-size: 11px; text-align: center;">LEGAL NOTICE</div>
                    <div class="col-md-2" style="color: #FFF; font-weight: normal; font-size: 11px; text-align: center;">PRIVACY & COOKIES POLICY</div>
                    <div class="col-md-2" style="color: #FFF; font-weight: normal; font-size: 11px; text-align: center;">TERMS & CONDITIONS OF USE</div>
                </div>
                <div style="text-align: center; color: #FFF; font-weight: normal; font-size: 11px; padding-bottom: 20px;">WHO WE ARE</div>
                <div class="container-fluid" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-3 col-md-offset-3" style="color: #FFF; font-weight: normal; font-size: 11px; text-align: center;">
                        <div class="btn btn-default" style="width: 120px; background: #d3ccbf; font-weight: bold;">Language</div>
                        <div class="btn btn-default" style="width: 120px; background: #d3ccbf; font-weight: bold;">Currency</div>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/facebook.png" width="40px" style="margin: 0px 5px;">
                        <img src="assets/images/twitter.png" width="40px" style="margin: 0px 5px;">
                        <img src="assets/images/instagram.png" width="40px" style="margin: 0px 5px;">
                        <img src="assets/images/googleplus.png" width="40px" style="margin: 0px 5px;">
                        <img src="assets/images/youtube.png" width="40px" style="margin: 0px 5px;">
                    </div>
                </div>
                <div style="margin-top: 30px;">
                    <p style="font-size: 12px; color: #fff; font-weight: normal; padding: 50px 180px; text-align: center;">En desarrollo de lo dispuesto en el artículo 17 de la ley 679 de 2001, la plataforma Coexperiences advierte a los turistas que la explotación y el abuso sexual de los menores de edad en el país son sancionados penal y administrativamente.</p>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        {!! Html::script('assets/js/jquery.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}

    </body>
</html>
