<<<<<<< HEAD
<?php use App\Models\User; ?>
=======
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
@extends('layouts.master')

@section('title')
    صفحه کاربری ادمین
@endsection
<<<<<<< HEAD


=======
    
 
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
@section('content')
<style>
  .vl {
    border-left: 2px solid rgb(219, 223, 219 );
    height: 14px;
    margin-left: 4px;
    margin-right: 4px;
  }
  .vla{
    border-left: 3px solid rgb(219, 223, 219 );
    height: 70px;
    margin-left: 25px;

  }
  </style>

<div style="width:100%" class=" d-flex  justify-content-center align-items-center">
  <img src="pic2.png " style="margin-right:auto margin_left:auto; width: 100px;">
  <div class="vla"></div>
  <h2 class="text-light">مدیریت جزوات</h2>
</div>
<!-- search users -->
<div style="width:100%; margin-bottom:15px;" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
  <form class="d-flex" role="search" method="GET" style="margin-left: auto; margin-right:auto " >
    <input class="form-control me-2 " type="search" name="search" placeholder=" نام - id"   value="{{ request('search') }}" aria-label="Search" style="width: 276px">
    <button class="btn btn-light" type="submit">جستجو</button>
  </form>
</div>
<!-- search users -->

<div class="album py-3" style="background-color: rgba(22, 24, 22, 0.5);">
    <div class="container" >
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @if($all_courses->total() != 0)
<table class="table table-dark table-striped" id="courses" >
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
<<<<<<< HEAD
         <?php $user=User::find($value->publisher_id) ?>
        <td>{{$user->name}}</td>
=======
        <td>{{$value->publisher_id}}</td>
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
        <td>{{$value->id}}</td>
        <td>
          <!-- Button trigger modal (Delete course)-->
        <button type="button" class="btn btn-danger btn-sm deleteCourse" value="{{$value->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
          حذف
       </button>

<!-- Modal (Delete User)-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-theme="dark">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h1 class="modal-title fs-5" id="exampleModalLabel">حذف جزوه</h1>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
     {{"آیا مطمئن هستید که می خواهید جزوه مورد نظر را حذف کنید؟"}}
     </div>
     <div class="modal-footer" style="flex-direction: row-reverse">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خیر</button>
       <form class="needs-validation" novalidate method="post" action="delete_course/{id}" enctype="multipart/form-data">
         @csrf
         <input type="text" name="course_id" class="form-control" id="course_id" readonly hidden>
       <button type="submit" class="btn btn-danger">بله</button>
     </form>
     </div>
   </div>
 </div>
</div>
        <div class="vl" style="display: inline-flex"></div>
        <a class="btn btn-light btn-sm" href="edit_course?id={{$value->id}}" role="button">ویرایش</a>
        </td>
      </tr>
      @php
          $counter+=1;
      @endphp
      @endforeach
    </tbody>
  </table>
  @else
        <div style="width:100%; height:300px" class=" d-flex  justify-content-center align-items-center">
          <h2 class="text-light" style="margin-left: 25px">404</h2>
          <div class="vla" ></div>
          <h2 class="text-light">جزوه ای مطابق با اطلاعات وارد شده پیدا نشد .</h2>
        </div>
  @endif
      </div>
      {{$all_courses->appends(['search' => request('search')])->links('vendor.pagination.bootstrap-5')}}
    </div>
</div>

@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
        $('.deleteCourse').click(function(e){

        e.preventDefault();

        var course_id = $(this).val();
        $('#course_id').val(course_id);
        $('#deleteModal').modal('show');
      });
    });
    </script>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
