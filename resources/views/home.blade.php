@extends('masterPage')

@section('content')

<div class="containt">
    <div class="container">
        <div class="left">
            <h3>catigory</h3>
            <div style="clear: both"></div>
            <ul style="padding-left: 5px;">
                
                @foreach($brands as $brand)
                    <li class="milist" style="color: #03A9F4"><a style="text-decoration: none;" href="brand_view?selected_brand={{$brand->brand_id}}"><i class="fa fa-plus-square" data-target="Huawei"></i>
                        {{$brand->brand_name}}</a></li>
                    <?php
                    $mobiles = DB::table('mobiles')->where('brand_id','=',$brand->brand_id)->get();
                    ?>
                    @foreach($mobiles as $mobile)
                    <a class="links" href="view-item?m_id=<?php echo($mobile->mobile_id) ?> " style="color:#000000 ;text-decoration: none;" ><li class="milist" style="margin-left: 30px"><i class="fa fa-plus-square" data-target="Huawei"></i>
                            {{$mobile->mobile_name}}</li></a>
                    @endforeach
                @endforeach
                
            </ul>
        </div>
        
        <div class="right">
            <div style="background-color: #DDD;height: 50px;">
              <div class="container" style="text-align: center;background-color: rgba(231,68,48,0.5);color: #870000;border-radius: 5px;">
                  <ul>
                    @foreach($errors->all() as $error)
                    <li style="" >{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
            <?php $mob = DB::table('mobiles')->get();
            
            ?>
            @foreach($mob as $mobile)
            <div class="card mb-3 mihover" style="max-width: 540px;font-weight: 700;font-size: 20px;height: 290px;">
                <div class="row no-gutters" style="height: 100%;">
                    <div class="col-md-4" style="width: 33.3333333%;height: 100%;">
                    <img src="images/{{$mobile->img}}" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title" style="font-weight: 700;font-size: 28px">{{$mobile->mobile_name}}</h3>
                      <h2 class="" style="text-align: center; font-weight: 700;font-size: 38px">$ {{$mobile->price}}</h2>
                      <div class="icon">
                        
                        @if(Auth::check())
                          <?php  
                            $link = 'add_love';
                          ?>
                        @else

                        @endif
                        <a href="
                              @if(Auth::check())
                                add_love?user_id={{Auth::user()->id}}&moblie_id={{$mobile->mobile_id}}

                              @else 
                                log-in
                              @endif
                              "
                        class="btn btn-light" style="">
                            Love
                        </a>
                        <a href="
                                @if(Auth::check())
                                  add_char?user_id={{Auth::user()->id}}&moblie_id={{$mobile->mobile_id}}
                                @else 
                                  log-in
                                @endif
                        " class="btn btn-light">
                            Chart
                        </a>
                          
                          <!--<i class="fa fa-heart-o"></i>
                          <i class="fa fa-shopping-cart"></i>-->
                      </div>
                      <div style="width: 100%;padding-top: 30px;padding-left: 30%;">
                          <a href="view-item?m_id=<?php echo($mobile->mobile_id) ?> " style="text-align: center;width: 60%">
                              <div class="btn btn-light mibuttonn"style="">View Item</div>
                          </a>
                      </div>
                      <!--<p class="card-text"><small class="text-muted"></small></p>-->
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            
            
     
            
        </div>
    </div>
</div>
@stop