@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<style type="text/css">
  .container {
    width: 100%;
    margin: 0px;
    padding: 0px;
  }
</style>

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="height: 400px; margin-bottom: 30px;">
      <div class="item active">
        {!! Html::image('assets/images/carousel_01.jpeg', 'Coexperiences' ,array('heigth'=>'200px', 'width'=>'100%')) !!}
      </div>

      <div class="item">
        {!! Html::image('assets/images/carousel_02.jpg', 'Coexperiences' ,array('heigth'=>'200px', 'width'=>'100%')) !!}
      </div>

      <div class="item">
        {!! Html::image('assets/images/carousel_03.jpg', 'Coexperiences' ,array('heigth'=>'200px', 'width'=>'100%')) !!}
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
          <div class="col-md-3">
              <div class="row" style="width: 70%;margin-left: 15%; text-align: center;">
                  <div class="col-md-12">
                      {!! Html::image('assets/images/maleta.png', 'Find & Reserve' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px;')) !!}
                  </div>
                  <div class="col-md-12" style="height: 60px; color: #000; font-weight: bold;">
                      FIND AND RESERVE YOUR EXPERIENCES
                  </div>
                  <div class="col-md-12">
                      <p style="color: #333;">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="row" style="width: 70%;margin-left: 15%; text-align: center;">
                  <div class="col-md-12">
                      {!! Html::image('assets/images/global.png', 'Colombia & Caribbean' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px')) !!}
                  </div>
                  <div class="col-md-12" style="height: 60px; color: #000; font-weight: bold;">
                      SPECIALIZED IN COLOMBIA AND THE CARIBBEAN
                  </div>
                  <div class="col-md-12">
                      <p style="color: #333;">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="row" style="width: 70%;margin-left: 15%; text-align: center;">
                  <div class="col-md-12">
                      {!! Html::image('assets/images/usuarios.png', 'Users' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px')) !!}
                  </div>
                  <div class="col-md-12" style="height: 60px; color: #000; font-weight: bold;">
                      LIVE EXPERIENCES AT THE BEST PRICE
                  </div>
                  <div class="col-md-12">
                      <p style="color: #333;">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="row" style="width: 70%;margin-left: 15%; text-align: center;">
                  <div class="col-md-12">
                      {!! Html::image('assets/images/bloquear.png', 'Safety' ,array('width'=>'96px', 'height'=>'96px', 'style'=>'margin-bottom: 10px')) !!}
                  </div>
                  <div class="col-md-12" style="height: 60px; color: #000; font-weight: bold;">
                      TRUST AND SAFETY
                  </div>
                  <div class="col-md-12">
                      <p style="color: #333;">Choose from a selection of tours and adventure activities, sports, ecotourism or cultural exchange activities like Spanish or salsa classes</p>
                  </div>
              </div>
          </div>
          <div class="col-md-2"></div>
      </div>
  </div>            

  <div class="activity container-fluid" style="color: #000; font-weight: normal; background: #eaeaea;">
      <h1 style="text-align: center; margin-top: 40px; margin-bottom: 40px;">Best Activities And Tours Of Colombia</h1>
      @foreach($experiences as $exp)
      <div class="col-md-4" style="margin-bottom: 30px;">
        <div class="row" style="margin-right: 30px; margin-left: 30px;">
          <div class="col-md-12" style="padding: 0px;">
            <a href="{{route('experience_show',array('id'=>$exp->exp_id))}}">
              <img width="100%" height="300px;" src={{asset('uploads/exp/'.$exp->exp_photo)}} >
            </a>
          </div>
          
          <div class="col-md-10" style="background: #fff;">
            <h4 style="font-weight: bold;">{{ strtoupper($exp->exp_name) }}</h4>
          </div>
          <div class="col-md-2" style="background: #fff;">
            <a href="{{ route('user_show',array('id'=>$exp->user_id)) }}">
              <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="float: right; border-radius: 50%;">
            </a>
          </div>

          <div class="col-md-12" style="background: #fff;">
            {{ $exp->name }} {{ $exp->last_name }} 
            <span><br>{{ number_format($exp->exp_price, 2, '.', ',') }} {{ $exp->cur_simbol }} ({{ $exp->cur_name }})</span>
            <span><br>{{ number_format($exp->exp_price/$exp->cur_exchange, 2, '.', ',') }} US$ (American Dollar)</span>
          </div>

            @if ($user == null)
            <div class="col-md-12" style="background: #fff; padding-bottom: 12px;">
              <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
            </div>
            @else
              @if($exp->exp_guide_id != $user->id)
              <div class="col-md-12" style="background: #fff; padding-bottom: 12px;">
                <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
              </div>
              @endif
            @endif

        </div>
      </div>
      @endforeach

      <div class="col-md-offset-5 col-md-1">
        <div class="btn btn-primary" style="margin-top: 30px; margin-bottom: 30px; height: 40px; width: 180px; font-size: 16px; font-weight: bold;">LOAD MORE</div>
      </div>
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

</div>

@endsection