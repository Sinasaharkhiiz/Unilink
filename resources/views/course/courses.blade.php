@extends('layouts.master')

@section('content')
<style>
  .vl {
    border-left: 3px solid rgb(219, 223, 219 );
    height: 70px;
    margin-left: 25px;
  }
  </style>
<main>
  <div style="width:100%" class=" d-flex  justify-content-center align-items-center">
    <img src="pic2.png " style="margin-right:auto margin_left:auto; width: 100px;">
    <div class="vl"></div>
    <h2 class="text-light">جزوات آموزشی</h2>
  </div>
  <div class="album py-3" style="background-color: rgba(22, 24, 22, 0.5);">
    <div class="container" >
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($c_data as $ket => $value)
        <div class="col">
          <div class="card shadow-sm bg-dark">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>{{$value->name}} </title>
              <rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body">
              <div class="text-center text-light">
                <h3>{{$value->name}}</h3>  
              </div>
              <p class="text-light">{{$value->description}} .</p>
              <div class="text-light text-center">
                 @if($value->price==0)
                        <p><strong> رایگان </strong></p>
                  @else
                        <p><strong>{{"قیمت :".$value->price." "."تومان"}}</strong></p> 
                  @endif
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="course?id={{$value->id}}"><button type="button" class="btn btn-sm btn-outline-light" style="width: 58px">ادامه</button></a>
                </div>
                <small class="text-light">{{$value->date}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        {{$c_data->links()}}
      </div>
    </div>
  </div>

</main>

@endsection