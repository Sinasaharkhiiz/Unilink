@extends('layouts.master')



@section('content')


<style>
    body {
        color : #ffffff;
    }
</style>
    
<h1 style=" display:inline"> {{$c_data->name}}</h1>
        <h3  style=" display:inline; margin-right:550px;margin-top:50px;">منتشر کننده : {{$p_data->name}}</h3>
    <br>
    
        <div class="form-group">
            <h3  style=" margin-right:20px;">خلاصه ای از جزوه :</h3>
            <div class="col-sm-10" style=" margin-right:120px;">
                <h4>{{$c_data->description}}</h4>
            </div>
        </div>
        
        <div class="form-group">
        <h3  style=" margin-right:20px;margin-top:50px;">.</h3>
        </div>
        <hr>
        <div class="form-group">
                <h3 style=" margin-right:20px; display:inline"> قیمت:</h3>
                @if($c_data->price=='0')
                <h4 style=" margin-right:30px; display:inline">رایگان</h4>
                <a style="margin-right: 50px; font-size:16px;" class="btn btn-success" href="{{"storage/".$c_data->content}}"> دانلود جزوه</a>
                @else
                <h4 style=" margin-right:30px; display:inline">{{$c_data->price." "."تومان"}}</h4>
                <a style="margin-right: 50px; font-size:16px;"   class="btn btn-success" href="{{"storage/".$c_data->content}}"> دانلود جزوه</a>
                @endif
        </div>
                
         
        
    
   
@endsection