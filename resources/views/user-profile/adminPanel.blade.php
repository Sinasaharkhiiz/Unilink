@extends('layouts.master')

@section('title')
    صفحه کاربری ادمین
@endsection


@section('content')
<style>
    body {
background-image: url("pic7.png");
}
</style>

<div class="album py-3" style="background-color: rgba(22, 24, 22, 0.5);">
  <div class="container" >
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col">
        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16" style="padding-left: 3px">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
          </svg>&nbsp;کاربران</div>
          <div class="card-body">
            <h5 class="card-title"> تعداد کاربران &nbsp;: &nbsp;&nbsp;{{$user_count}} </h5>
            <hr class="text-light">
            <div class="d-grid gap-3 col-5 mx-auto">
                <a href="users_management"><button type="button" class="btn btn-sm btn-primary" >اطلاعات بیشتر</button></a>
              </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
            <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
            <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
          </svg>&nbsp;&nbsp;جزوات آموزشی</div>
          <div class="card-body">
            <h5 class="card-title">تعداد جزوات &nbsp;: &nbsp;&nbsp;{{$course_count}}</h5>
            <hr class="text-light">
            <div class="d-grid gap-3 col-5 mx-auto">
                <a href="courses_management"><button type="button" class="btn btn-sm btn-primary" >اطلاعات بیشتر</button></a>
              </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Dark card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Dark card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>




@endsection
