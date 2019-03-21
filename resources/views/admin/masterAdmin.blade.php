<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <?php
    $links = array(
                array('Home','home'),
                array('Login','/log-in'),
                array('Register','register')
            );
    ?>
    <body style="">
        <!--Upper nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
            <div class="container">
                    <a class="navbar-brand"><span>M</span>commerce</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <?php $testActive = true; ?>
                        @foreach($links as $link)
                      
                        <li class="nav-item <?php if($testActive){echo $testActive ;} $testActive = false; ?>">
                          <a class="nav-link" href="{{$link[1]}}">{{$link[0]}} <span class="sr-only">(current)</span></a>
                        </li>
                        @endforeach
                        
                      </ul>
                      <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0 srech" type="submit">Search</button>
                      </form>
                       @if(Auth::check() && (Auth::user()->group_id == 1||Auth::user()->group_id == 1001))
                            <li style="list-style: none;color:#5D6772;font-family: sans-serif;padding-left: 15px;">
                                
                                <a  href="view_profile?user_id={{Auth::user()->id}}" style="text-decoration: none;">
                                    <img src="images/img/{{Auth::user()->img}}" alt="..." style="margin: 10px;
                                    width:40px;height: 40px;border-radius: 50%;">
                                    {{Auth::user()->name}}</a>
                            </li>
                            <li style="list-style: none;color:#5D6772;font-family: sans-serif;padding-left: 15px;">
                                
                                <a style="text-decoration: none;" href="log-out"><i class="fa fa-angle-double-right" style="padding: 10px;font-size: 23px;"></i>
                                    Log OUt</a>
                            </li>
                            

                        @else
                        <li style="list-style: none;color:#5D6772;font-family: sans-serif;padding-left: 15px;">
                            
                            <a href="log-in" style="text-decoration: none;"><i class="fa fa-user" style="padding: 10px;font-size: 23px;"></i>
                                Log IN</a>
                        </li>
                        @endif
                    </div>
            </div>
          </nav>
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #FFF;">
            <div class="container">
                    <a class="navbar-brand "><i class="fa fa-home main-bg "></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <?php $testActive = true; ?>
                            
                             
                                 <?php $i=1; ?>
                                 @foreach($brands as $brand)
                                 <li class=" dropdown">
                                    <a class="nav-link dropdown-toggle" style="color:#8B8787;font-weight: bold;font-size: 20px;"
                                       href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     {{$brand->brand_name}} 
                                    </a>
                                    <div class="dropdown-menu" >
                                        <?php  
                                        $ms = DB::table('mobiles')->where('brand_id', '=', $brand->brand_id)->get();
                                        ?>
                                        @foreach($ms as $mobile)
                                            
                                            <a class="dropdown-item miitem" href="view-item?m_id=<?php echo $mobile->mobile_id ?>">{{$mobile->mobile_name}}</a>
                                        @endforeach
                                      
                                    </div>
                                    <?php  $i++; ?>
                                     </li>
                                 @endforeach
                               @if(Auth::check())
                                    @if(Auth::user()->group_id == 1 || Auth::user()->group_id == 1001)
                                        <a style="text-decoration: none ; margin-left: 75px;" href="admin_panal">
                                            <div class="btn btn-primary" 
                                            style="list-style: none;color:#FFF;font-family: sans-serif;padding-left: 15px; width: 100%;height: 100%;">
                                                
                                                
                                                    <!--<i class="fa fa-angle-double-right" style="padding: 10px;font-size: 23px;"></i>-->
                                                    Manage
                                            </div>
                                        </a>
                                    @endif
                                @endif
                      <!--  
                        @foreach($brands as $brand)
                      
                        <li class="nav-item " style="color:#8B8787;font-weight: bold;font-size: 20px;">
                          <a class="nav-link" href="#">{{$brand->brand_name}} <span class="sr-only">(current)</span></a>
                        </li>
                        @endforeach
                        -->
                      </ul>
                      
                    </div>
            </div>
          </nav>
        
        <!--Upper nav bar-->
        <!--  header --><!--
        <div class="header miheader" style="background-image: url('images/caro/start-an-ecommerce-business.jpeg')">
            <div class="back ">
                <div class='container'>
                    <h1><i class="fa fa-mobile "></i>Mobile Shop </h1>
                </div>
            </div>
        </div>
        <!-- -->

        @yield('content')
        
        <!--Footer-->
        <div class="footer" style="height: 150px">
            <div class="container">
                
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
