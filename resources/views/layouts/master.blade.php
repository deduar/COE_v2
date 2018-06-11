<html>
    <head>
        <title>@yield('title')</title>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/app.css') !!}

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>


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
                        {!! Html::image('assets/images/logo.png', 'Coexperiences' ,array('width'=>'120px')) !!}
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
                            <a class="menu_profile" href="{{ route('edit_profile') }}" />
                                <i class="fa fa-btn fa-user"></i>{{ trans("welcome.edit_profile") }}
                            </a>
                        </li>
                        <li>
                            <a class="menu_profile" href="{{ route('edit_password') }}" />
                                {{ trans("welcome.change_passwd") }}
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        @if ($user->group == 'Guide')
                        <li>
                            <a class="menu_profile" href="{{ route('my_experience') }}" />
                                {{ trans("welcome.experiences") }}
                            </a>
                        </li>
                        @endif
                        <li>
                            <a class="menu_profile" href="{{ route('reservation') }}" />
                                {{ trans("welcome.reservation") }}
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
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
                    <a href="{{ route('welcome') }}" />
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

        <div class="container">
            @yield('content')
        </div>

              
        @yield('footer')        
        <div class="footer">            
            <br>
            <p style="text-align: center;">Footer</p>
            <br>
        </div>

        <!-- Scripts -->
        {!! Html::script('assets/js/jquery.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}
    </body>
</html>