@extends('layouts.master')
@section('title')
unilink
@endsection
@section('content')
    <div style="margin-top:20px; width:100%" class=" d-flex row justify-content-center align-items-center">
        <img src="pic2.png " style="margin-right:auto margin_left:auto; width: 300px;">
    </div>

    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <svg class="bd-placeholder-img" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
            <div class="container">
              <div class="carousel-caption text-start">
                <h1>جزوات آموزشی</h1>
                <p class="opacity-75">بیش از 4 هزار جزوه آموزشی از دانشجویان سراسر کشور</p>
                <p><a class="btn btn-outline-light" href="courses">مشاهده جزوات</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
            <div class="container">
                <div class="carousel-caption text-start">
                  <h1>دوره های آموزشی</h1>
                  <p class="opacity-75">دوره های آموزشی Unilink هرآنچه برای موفقیت نیاز دارید. با تدریس بهترین اساتید ایران</p>
                  <p><a class="btn btn-outline-light" href="#">مشاهده دوره های آموزشی</a></p>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
            <div class="container">
                <div class="carousel-caption text-start">
                  <h1>پیام رسان Uni Messenger</h1>
                  <p class="opacity-75">به راحتی با سایر دانشجویان و اساتید ارتباط برقرار کن و تجربیاتت رو به اشتراک بذار</p>
<<<<<<< HEAD
                  <p><a class="btn btn-outline-light" href="chatify">Uni Messenger</a></p>
=======
                  <p><a class="btn btn-outline-light" href="#">Uni Messenger</a></p>
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
                </div>
              </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">التالي</span>
        </button>
      </div>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
