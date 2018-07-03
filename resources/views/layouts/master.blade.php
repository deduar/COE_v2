    <html>
    <head>
        <title>@yield('title')</title>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/app.css') !!}

        <!-- Fonts -->
        <!--link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/Favicon.png')}}">


    </head>
    <body>
        @section('menu')
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
                    <a class="menu" href="{{ route('my_experience') }}" />
                        {{ trans('welcome.list_exp') }}
                    </a>
                </li>
                <li>
                @if(Auth::check())
                    <button class="menu btn btn-default dropdown-toggle" type="button" id="user" data-toggle="dropdown">
                    {{ $user['name']}} {{ $user['lastName']}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="user">                        
                        <li>
                            <a class="menu_profile" href="{{ route('user_show') }}" />
                                <i class="fa fa-btn fa-user"></i>{{ trans("welcome.profile") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('messages') }}" />
                                <i class="fa fa-btn fa-user"></i>{{ trans("welcome.messages") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('reservation') }}" />
                                {{ trans("welcome.reservation") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('collection') }}" />
                                {{ trans("welcome.my_collections") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('transaction_log') }}" />
                                {{ trans("welcome.my_trans_history") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('invite_friend') }}" />
                                {{ trans("welcome.invite_friend") }}
                            </a>
                        </li>
                        <!--li>
                            <a class="menu_profile" href="{{ route('edit_password') }}" />
                                {{ trans("welcome.change_passwd") }}
                            </a>
                        </li-->
                        <!--li role="separator" class="divider"></li-->

                        @if ($user->group == 'Guide')
                        <li class="navbarpadding">
                            {{ trans("welcome.insiders") }}
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('my_experience') }}" />
                                {{ trans("welcome.experiences") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('my_experience') }}" />
                                {{ trans("welcome.exp_reserve_list") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('my_experience') }}" />
                                {{ trans("welcome.payout_settings") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('my_experience') }}" />
                                {{ trans("welcome.transacctional_history") }}
                            </a>
                        </li>
                        @endif
                        <!--li>
                            <a class="menu_profile" href="{{ route('reservation') }}" />
                                {{ trans("welcome.reservation") }}
                            </a>
                        </li-->
                        <li role="separator" class="divider"></li>
                        @if ($user->admin)
                            <li>
                            <a class="menu_profile" href="{{ route('admin') }}" />
                                {{ trans("welcome.admin") }}
                            </a>
                        </li>
                        @endif
                        <li>
                            <a class="menu_profile" href="{{ route('logout') }}" />
                                {{ trans("welcome.logout") }}
                            </a>
                        </li>
                    </ul>
                @else
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
                @endif
                </li>
                <li>
                    <a href="{{ route('experience_index') }}" />
                        <button type="button" class="btn btn-primary navbar-btn">
                            {{trans('welcome.find_exp') }}
                        </button>
                    </a>
                </li>
                <li style="margin-top: 15px;"><a href="{{ route('setLocale','es') }}"><img class="img-rounded" src={{ asset('assets/images/es.png') }} alt="Español"></a></li>
                <li style="margin-top: 15px;"><a href="{{ route('setLocale','en') }}"><img class="img-rounded" src={{ asset('assets/images/us.png') }} alt="English"></a></li>
            </ul>
          </div>
        </nav>
        @show

        @section('sidebar')
        @show

        <div class="container" style="background: #F4F3EE; width: 100%; margin-bottom: 0px; padding-bottom: 30px;">
            @yield('content')
        </div>

              
        @yield('footer')
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
                    <img src="{{asset('assets/images/facebook.png')}}" width="40px" style="margin: 0px 5px;">
                    <img src="{{asset('assets/images/twitter.png')}}" width="40px" style="margin: 0px 5px;">
                    <img src="{{asset('assets/images/instagram.png')}}" width="40px" style="margin: 0px 5px;">
                    <img src="{{asset('assets/images/googleplus.png')}}" width="40px" style="margin: 0px 5px;">
                    <img src="{{asset('assets/images/youtube.png')}}" width="40px" style="margin: 0px 5px;">
                </div>
            </div>
            <div style="margin-top: 30px;">
                <p style="font-size: 12px; color: #fff; font-weight: normal; padding: 50px 180px; text-align: center;">En desarrollo de lo dispuesto en el artículo 17 de la ley 679 de 2001, la plataforma Coexperiences advierte a los turistas que la explotación y el abuso sexual de los menores de edad en el país son sancionados penal y administrativamente.</p>
            </div>
        </div>

        <!-- Scripts -->
        {!! Html::script('assets/js/jquery.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}
    </body>
</html>