@extends('layouts.master')

@section('title')
   درخواست تدریس
@endsection


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
  <h2 class="text-light">مدیریت درخواست های تدریس</h2>
</div>
<!-- search users -->
<div style="width:100%" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
  <form class="d-flex" role="search" method="GET" style="margin-left: auto; margin-right:auto " >
    <input class="form-control me-2 " type="search" name="search" placeholder=" نام - نام کاربری"   value="{{ request('search') }}" aria-label="Search" style="width: 276px">
    <button class="btn btn-light" type="submit">جستجو</button>
  </form>
</div>
<!-- search users -->
<br>

<div class="album py-3" style="background-color: rgba(22, 24, 22, 0.5);">
    <div class="container" >
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @if($all_users->total() != 0)
<table class="table table-dark table-striped" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">نام</th>
        <th scope="col">نام کاربری</th>
        <!--<th scope="col">ایمیل</th>-->
        <th scope="col">نقش</th>
        <th scope="col">id</th>
        <th scope="col">عملیات</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @php
            $counter = 1;
        @endphp
        @foreach ($all_users as $key => $value)
      <tr>
        <th scope="row">{{$counter}}</th>
        <td>{{$value->user->name}}</td>
        <td>{{$value->user->username}}</td>
        <!--<td>{{--$value->email--}}</td>-->
        @if ($value->user->role=="super_admin")
        <td>مدیر</td>
        @elseif ($value->user->role=="student")
        <td>دانش آموز</td>
        @endif

        <td>{{$value->user->id}}</td>
        <td>
          <!-- Button trigger modal (Delete User)-->
        <button type="button" class="btn btn-danger btn-sm delete_req" value="{{$value->id}}"  onclick="setValue(this)" data-bs-toggle="modal" data-bs-target="#exampleModal">
           رد درخواست
        </button>

<!-- Modal (Delete User)-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-theme="dark">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">رد درخواست</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" value="{{$value->id}}"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate method="post" action="delete_req/{id}" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <label for="message-text" class="col-form-label">دلیل رد درخواست:</label>
                <input type='text'class="form-control" name="message-text" id="message-text" required>
              </div>

          </div>
          <div class="modal-footer" style="flex-direction: row-reverse">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">بازگشت</button>

                <input type="text" name="req_id" class="form-control" id="req_id" readonly hidden>
              <button type="submit" class="btn btn-danger">رد درخواست</button>
            </form>
          </div>
        </div>
      </div>
    {{--
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">حذف کاربر</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{"آیا مطمئن هستید که می خواهید کاربر مورد نظر را حذف کنید؟"}}
      </div>
      <div class="modal-footer" style="flex-direction: row-reverse">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خیر</button>
        <form class="needs-validation" novalidate method="post" action="delete_user/{id}" enctype="multipart/form-data">
          @csrf
          <input type="text" name="user_id" class="form-control" id="user_id" readonly hidden>
        <button type="submit" class="btn btn-danger">بله</button>
      </form>
      </div>
    </div>
  </div>
  --}}
</div>
<!-- ----------------------- -->
        <div class="vl" style="display: inline-flex"></div>
        <a class="btn btn-light btn-sm" href="edit_user?id={{$value->user_id}}" role="button">اطلاعات کاربر</a>
        <div class="vl" style="display: inline-flex"></div>
        <a class="btn btn-success btn-sm" href="accept_teach?id={{$value->id}}" role="button">پذیرفتن درخواست</a>
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
          <h2 class="text-light">درخوسات جدیدی برای تدریس یافت نشد.</h2>
        </div>
  @endif
      </div>
    </div>
</div>

@endsection
@section('scripts')

    <script>
        function setValue(button) {
            var input = document.getElementById('req_id');
            input.value = button.value;
            $('#deleteModal').modal('show');
        }
    </script>
@endsection
