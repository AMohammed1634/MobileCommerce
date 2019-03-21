@extends('masterPage')
@section ('content')

<div class="containt">
    <div class="container">
    	<div class="left">
            <h3>catigory</h3>
            <div style="clear: both"></div>
            <ul><?php $mo; ?>
                <!--@foreach($mobile as $brand)
                    
                @endforeach-->
                <?php $mo= $brand->brand_id ;$selected_brand; ?>
                @foreach($brands as  $br)
                    @if($br->brand_id == $mo)
                        <?php 
                            $selected_brand = $br;
                        ?>
                        <li><a style="text-decoration: none;" href="brand_view?selected_brand={{$brand->brand_id}}"><i class="fa fa-plus-square" data-target="Huawei"></i>{{$br->brand_name}}</a></li>
                        <?php 
                        $mobilesLikeBrand = DB::table('mobiles')->where('brand_id','=',$mo)->get();
                        $selected_img;
                        ?>
                        @foreach($mobilesLikeBrand as $item)
                            <a href="view-item?m_id=<?php echo $item->mobile_id ; ?>" style="color: #000; text-decoration: none;">
                            <li class="milist" style="margin-left: 30px;
                                @if($_GET['m_id']==$item->mobile_id)
                                    color: #03A9F5;
                                    <?php  $selected_img = $item ; ?>
                                @endif"><i class="fa fa-plus-square" data-target="Huawei"></i>
                                {{$item->mobile_name}}  </li>
                            </a>
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="right view-item" style="width: 71.3%;    padding: 15px;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
    margin: 20px">
            
            <!-- -->
            <div class="de" style="width:60%;float:left;">
                <h1 class="title" style="font-weight: bold;font-size:40px;padding-top:0;">{{$selected_img->mobile_name}}</h1>
                <p>
                    <span class="mobile-barnd">
                        <span class="mobile-cat"> <br>
                    <i class="fa fa-tag"></i> Category : </span>
                    <span>{{$selected_brand->brand_name}}</span>
                    </span>
                </p>
                <span class="mobile-rate">
                    <span class="rate"> 
                        <i class="fa fa-eye">
                            
                        </i> Rate : </span>
                        @for($i=0 ; $i<$selected_img->rate ; $i++)
                            <i class="fa fa-star" style="color:#FF9800"></i>
                        @endfor
                        @for($i=$selected_img->rate ; $i<5 ; $i++)
                            <i class="fa fa-star" style="color:#DDD;"></i>
                        @endfor
                        
                </span>
                <hr>
                <h4>Key Features</h4>
                <?php  
                    $str = $selected_img->disc;
                    $str_arr = explode ('>>',$str);
                ?>
                <p>
                    <ul>
                        @foreach($str_arr as $item)
                            <li>&gt;&gt;{{$item}}</li>
                        @endforeach
                    </ul>
                </p>
                <hr>
                <h4>EGP {{$selected_img->price}}</h4>
                <div style="text-align: center;">
                    
                    @if(Auth::check())
                          <?php  
                            $link = 'add_love';
                          ?>
                        @else

                        @endif
                        <a href="
                              @if(Auth::check())
                                add_love?user_id={{Auth::user()->id}}&moblie_id={{$selected_img->mobile_id}}

                              @else 
                                log-in
                              @endif
                              "
                        class="btn btn-primary" style="">
                            Love
                        </a>
                        <a href="
                                @if(Auth::check())
                                  add_char?user_id={{Auth::user()->id}}&moblie_id={{$selected_img->mobile_id}}
                                @else 
                                  log-in
                                @endif
                        " class="btn btn-primary">
                            Chart
                        </a>
                </div>
            </div>
            <div class="img" style="width:30%;float:right; height:330px;">
                <a href="#"><img src="images/{{$selected_img->img}}" style="width:100%;height:100%"></a>
            </div>
            <!-- -->
    	</div>
       <div style="clear:both"></div>
       <div style="width:11%;margin: auto;border:1px solid #DDD;margin-bottom: 0;padding:10px;font-size:25px;border-radius: 6px 6px 0 0px">
            
            Reviews
        </div>
        <hr  style="margin-top:0px;">
        <div class="page-title-list">

            @foreach($comments as $comment)
                <?php
                    $selected_user = DB::table('users')->where('id','=',$comment->user_id)->get();
                    $this_user;
                ?>
                <img src="images/img/@foreach($selected_user as $one){{$one->img}} <?php $this_user=$one; ?>@endforeach"  style="width:50px;
                height:50px; margin-right:10px; border-radius: 50%;;" align='center'>{{$one->name}}<br><span style="margin-left:60px; font-size:14px;">
                        {{$one->created_at}}</span>
                <spane style="margin-left:100px;">{{$comment->comment}}</spane>
                <br>
            @endforeach
        </div>
        <div class="page-title-list">
            @if(Auth::check())

                <form method="post" action="add_comment/{{Auth::user()->id}}?mobile_id={{$item_id}}">
                    {{ csrf_field() }}
                    <div class="input-group" style="padding: 15px;">
                        <img src="images/img/{{Auth::user()->img}}" style="width:40px;height:40px;border-radius: 50%;margin-right:10px;" align='center'>
                        <input type="text" name="comment" class="form-control" placeholder="Add Comment . . . .">
                        <span class="input-group-btn">
                  <button class="btn btn-outline-primary" type="submit">Share</button>
                  </span>
                    </div>
                </form>

            @else


            @endif

        </div>
        <div style="width:44%;margin: auto;border:1px solid #DDD;margin-bottom: 0;padding:10px;font-size:25px;border-radius: 6px 6px 0 0px">
            
            Sponsored products related to this item
        </div>
        <hr style="margin-top:0px;">
        <div >
            <?php 
                $br = $selected_brand->brand_id;
                $brands = DB::table('brands')->get();
                $mobiles = DB::table('mobiles')->where('brand_id','=',$br)->get();
            ?>

            <!--<div style="background-color: #DDD;height: 50px;"></div>-->
            
            @foreach($mobiles as $mobile)
            <div class="card mb-3 mihover" style="max-width: 350px;font-weight: 700;font-size: 20px;height: 290px;">
                <div class="row no-gutters" style="height: 100%;">
                    <div class="col-md-4" style="width: 33.3333333%;height: 100%;">
                    <img src="images/{{$mobile->img}}" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title" style="font-weight: 700;font-size: 28px">{{$mobile->mobile_name}}</h3>
                      <h2 class="" style="text-align: center; font-weight: 700;font-size: 38px">$$ {{$mobile->price}}</h2>
                      <div class="icon">
                         
                    
                    @if(Auth::check())
                          <?php  
                            $link = 'add_love';
                          ?>
                        @else

                        @endif
                        <a href="
                              @if(Auth::check())
                                add_love?user_id={{Auth::user()->id}}&moblie_id={{$selected_img->mobile_id}}

                              @else 
                                log-in
                              @endif
                              "
                        class="btn btn-primary" style="">
                            Love
                        </a>
                        <a href="
                                @if(Auth::check())
                                  add_char?user_id={{Auth::user()->id}}&moblie_id={{$selected_img->mobile_id}}
                                @else 
                                  log-in
                                @endif
                        " class="btn btn-primary">
                            Chart
                        </a>
                
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
        <div style="clear: both;"></div>
        <br>
        <hr>
        <br>
        <!-- -->
        <div style="width:21%;margin: auto;border:1px solid #DDD;margin-bottom: 0;padding:10px;font-size:25px;border-radius: 6px 6px 0 0px">

            Recently Viewed
        </div>
        <hr style="margin-top:0px;">

        <div >
        <?php
        $br = $selected_brand->brand_id;
        $brands = DB::table('brands')->get();
        $mobiles = DB::table('mobiles')->where('brand_id','=',$br)->get();
        ?>

        <!--<div style="background-color: #DDD;height: 50px;"></div>-->

            @foreach($mobiles as $mobile)
                <div class="card mb-3 mihover" style="max-width: 350px;font-weight: 700;font-size: 20px;height: 290px;">
                    <div class="row no-gutters" style="height: 100%;">
                        <div class="col-md-4" style="width: 33.3333333%;height: 100%;">
                            <img src="images/{{$mobile->img}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title" style="font-weight: 700;font-size: 28px">{{$mobile->mobile_name}}</h3>
                                <h2 class="" style="text-align: center; font-weight: 700;font-size: 38px">$$ {{$mobile->price}}</h2>
                                <div class="icon">


                                    @if(Auth::check())
                                        <?php
                                        $link = 'add_love';
                                        ?>
                                    @else

                                    @endif
                                    <a href="
                              @if(Auth::check())
                                            add_love?user_id={{Auth::user()->id}}&moblie_id={{$selected_img->mobile_id}}

                                    @else
                                            log-in
@endif
                                            "
                                       class="btn btn-primary" style="">
                                        Love
                                    </a>
                                    <a href="
                                @if(Auth::check())
                                            add_char?user_id={{Auth::user()->id}}&moblie_id={{$selected_img->mobile_id}}
                                    @else
                                            log-in
@endif
                                            " class="btn btn-primary">
                                        Chart
                                    </a>

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

        <!-- -->
        </div>

    </div>


   
</div>
@stop