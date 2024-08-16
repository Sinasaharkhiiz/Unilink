<?php use App\Models\User; ?>
@extends('layouts.master')
@section('title')
جزوات آموزشی
@endsection
@section('content')
<style>
  .vl {
    border-left: 3px solid rgb(219, 223, 219 );
    height: 70px;
    margin-left: 25px;
  }
  .vll {
    border-left: 3px solid rgb(219, 223, 219 );
    height: 8px;
    margin-left: 5px;
    margin-right: 5px;
  }
  </style>
<main>
  <div style="width:100%" class=" d-flex  justify-content-center align-items-center">
    <img src="pic2.png " style="margin-right:auto margin_left:auto; width: 100px;">
    <div class="vl"></div>
    <h2 class="text-light">جزوات آموزشی</h2>
  </div>

  <div style="width:100%" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
    <form class="d-flex" role="search" method="GET" style="margin-left: auto; margin-right:auto " >
      <input class="form-control me-2 " type="search" name="search" placeholder="دنبال چی میگردی؟"   value="{{ request('search') }}" aria-label="Search" style="width: 276px">
      <button class="btn btn-light" type="submit">جستجو</button>
    </form>
  </div>
  <br>
  <div class="album py-3" style="background-color: rgba(22, 24, 22, 0.88);">
    <div class="container" >
        <div style="width:100%; margin-bottom:15px;" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
            <label class="form-label text-light" for="ordering" style="font-size: 18px"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
              </svg> مرتب سازی براساس </label>
            <form action="">
            <select class="form-select "  onchange="this.form.submit()" aria-label="Default select example" style="width: 150px" name="order" id="ordering">
                <option selected >{{$c_order}}</option>
                @if($c_order!='برترین')<option value="best">برترین </option>@endif
                @if($c_order!='جدید ترین')<option value="newest">جدید ترین</option>@endif
                @if($c_order!='ارزان ترین')<option value="cheapest">ارزان ترین</option>@endif
                {{--@if($c_order!='قدیمی ترین')<option value="oldest">قدیمی ترین</option>@endif--}}
              </select>
              <input type="hidden" name="search" value="{{ request()->search }}" />
            </form>
            </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @if($c_data->total() != 0)
        @foreach ($c_data as $key => $value)
        <div class="col">
          <div class="card shadow-sm bg-dark">
           {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">--}}
                <img src={{asset("storage/".$value->cover)}} alt="" class="bd-placeholder-img card-img-top" width="100%" height="180">
              <title>{{$value->name}} </title>
              <rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body">
              <div class="text-center text-light">
                <h3>{{$value->name}}</h3>
              </div>
              <p class="text-center" style="color: rgb(139, 138, 138)">{{$value->description}} .</p>
              <div class="d-flex justify-content-between align-items-center">
              <?php $p_dat=User::find($value->publisher_id);?>
              <a href="teacher?id={{$value->publisher_id}}" rel="noopener noreferrer" class="dropdown-item">
                <p class="text-light"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-video3" viewBox="0 0 16 16">
                    <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783Q16 12.312 16 12V4a2 2 0 0 0-2-2z"/>
                  </svg>{{" ".$p_dat->name}}</p></a>
                  <p class="text-light" style="display: inline-flex">{{$value->users->count()}}<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                  </svg></p>
                  @if ($value->rate!=0)
                  <div class="vll"></div>
                  <p class="text-warning" style="display: inline-flex">{{$value->rate}}<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></p>
                  @endif
              </div>
              <hr class="text-light">
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="course?id={{$value->id}}"><button type="button" class="btn btn-sm btn-outline-light" style="width: 58px">ادامه</button></a>
                </div>
               {{--  <p style="color: rgb(102, 105, 103);margin-bottom:2px"><strong><s> 3000000 </s></strong></p>--}}
                @if($value->price==0)
                        <p style="color: rgb(34, 197, 94);margin-bottom:2px"><strong> رایگان </strong></p>
                  @else
                        <p style="color: rgb(34, 197, 94);margin-bottom:2px"><strong>{{$value->price." "."تومان"}}</strong></p>
                  @endif
                <small style="color: rgb(139, 138, 138)">{{jdate($value->created_at)->format('%B %d، %Y')}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div style="width:100%; height:300px" class=" d-flex  justify-content-center align-items-center">
          <h2 class="text-light" style="margin-left: 25px">404</h2>
          <div class="vl" ></div>
          <h2 class="text-light">متاسفانه جزوه ای با عنوان ورودی شما یافت نشد</h2>
        </div>
        @endif
      </div>
      {{$c_data->appends(['search' => request('search'),'order'=> request('order')])->links('vendor.pagination.bootstrap-5')}}
    </div>
  </div>

</main>

@endsection
