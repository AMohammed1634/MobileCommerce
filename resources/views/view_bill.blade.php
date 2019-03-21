@extends('Admin.masterAdmin')

@section('content')
    <style type="text/css">
        .mi-form-style{
            width: 60%;
            margin: auto;
            padding: 15px;
            color:#000;
            border:0.5px solid #DDD;
            border-top: 4px solid #007BFF;
            font-family: sans-serif;
            box-shadow: 7px 7px 7px #DDD;
            box-shadow:-7px -7px -7px #DDD;
        }
    </style>
    <?php
    $admin_option = array(
        array('add_mobile','Add Mobile'),
        array('add_brand','Add Brand')
    );
    ?>
    <div class="container" style="padding: 15px;text-align: center;">
        @foreach($admin_option as $option)
            <a href="{{$option[0]}}" style="margin: 7px;"><div type="button" class="btn btn-primary">{{$option[1]}}</div></a>

    @endforeach
    <!--<a href="#"><div type="button" class="btn btn-primary">Primary</div></a>
            <a href="#"><div type="button" class="btn btn-primary">Primary</div></a>
           <a href="#"><div type="button" class="btn btn-primary">Primary</div></a>-->
    </div>
    <div class="container">
        <div style="font-size: 90px; text-align: center;color:#000;text-shadow: 7px 7px 3px #000;">Add Brand</div>
        <div class="mi-form-style" style="color:#000">
            <form action="add_brand/save" method="post" class="form-group admin-form" style="color: #000;padding: 10px;"><br>
                {{ csrf_field() }}
                <lable>Brand Name</lable><input name="brand_name" class="form-control" type="text">
                <div style="">

                </div>
                <br>
                <lable>Brand ID</lable><input name="brand_id" class="form-control" type="text"><br>
                <button type="submit" class="btn btn-primary mb-2">ADD THIS Brand</button>
            </form>
            <div class="container" style="text-align: center;background-color: rgba(231,68,48,0.5);color: #870000;border-radius: 5px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="" >{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



@stop