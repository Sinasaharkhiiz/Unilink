@extends('layouts.master')

@section('title')
    صفحه کاربری ادمین
@endsection
    
 
@section('content')
<style>
  .vl {
    border-left: 2px solid rgb(219, 223, 219 );
    height: 14px;
    margin-left: 4px;
    margin-right: 4px;
  }
  </style>

<div class="album py-3" style="background-color: rgba(22, 24, 22, 0.5);">
    <div class="container" >
      <div class="row row-cols-1 row-cols-md-4 g-4">
<table class="table table-dark table-striped" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">نام</th>
        <th scope="col">قیمت</th>
        <th scope="col">منتشر کننده</th>
        <th scope="col">id</th>
        <th scope="col">عملیات</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @php
            $counter = 1;
        @endphp
        @foreach ($all_courses as $key => $value)
      <tr>
        <th scope="row">{{$counter}}</th>
        <td>{{$value->name}}</td>
        <td>{{$value->price}}</td>
        <!--<td>{{--$value->email--}}</td>-->
        <td>{{$value->publisher_id}}</td>
        <td>{{$value->id}}</td>
        <td>
          <a href=""><div class="text-danger" style="display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><title>حذف</title>
          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
        </svg></div></a>
        <div class="vl" style="display: inline-flex"></div>
        <a href=""><div class="text-primary" style="display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><title>ویرایش</title>
          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
        </svg></div></a>
        </td>
      </tr>
      @php
          $counter+=1;
      @endphp
      @endforeach
    </tbody>
  </table>
      </div>
    </div>
</div>

@endsection