@extends('layouts.master')
@section('title')
unilink
@endsection
@section('content')

    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner" style="border-radius: 45px">
          <div class="carousel-item active" style="border-radius: 25px">
            <img src="carousel-1.jpg"  class="" alt="" style="max-height: 500px" >
            <div class="container">
                <div>
                    <div class="carousel-caption text-start" >
                        <h1 class="txt-carousel text-dark"><b>منابع آموزشی</b></h1>
                        <p class="opacity-75 txt-carousel text-dark">بیش از 4 هزار جزوه آموزشی از دانشجویان سراسر کشور</p>
                        <p><a class="btn btn-outline-light" href="courses">مشاهده جزوات</a></p>
                    </div>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="carousel-3.jpg"  class="" alt="" style="max-height: 500px" >
            <!--svg class="bd-placeholder-img" width="100%" height="550" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg-->
            <div class="container">
                <div class="carousel-caption text-start" >
                  <h1 class="text-dark txt-carousel"><b>مسابقات  Uni Quiz</b></h1>
                  <p class=" txt-carousel text-dark">با شرکت در مسابقات Uni Quiz اطلاعاتت رو به چالش بکش و جایزه ببر</p>
                  <p><a class="btn btn-outline-light" href="quiz">ورود به Uni Quiz</a></p>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <img src="carousel-2.jpg"  class="" alt="" style="max-height: 500px" >
            <!--svg class="bd-placeholder-img" width="100%" height="550" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg-->
            <div class="container">
                <div class="carousel-caption text-start" >
                  <h1 style="color: rgb(27, 89, 151)" class="txt-carousel"><b>پیام رسان Uni Messenger</b></h1>
                  <p class="opacity-75 txt-carousel text-dark">به راحتی با سایر دانشجویان و اساتید ارتباط برقرار کن و تجربیاتت رو به اشتراک بذار</p>
                  <p><a class="btn btn-outline-light" href="chatify">Uni Messenger</a></p>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <img src="carousel-4.jpg"  class="" alt="" style="max-height: 500px" >
            <!--svg class="bd-placeholder-img" width="100%" height="550" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg-->
            <div class="container">
                <div class="carousel-caption text-start" >
                  <h1 style="color: rgb(27, 89, 151)" class="txt-carousel"><b>تدریس در Uni Link</b></h1>
                  <p class=" txt-carousel text-dark">همین حالا تدریس رو شروع کن  و کسب درآمد کن.</p>
                  <p><a class="btn btn-outline-dark" href="teach">فرم تدریس UniLink</a></p>
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


      <!--div style="display: inline;background-color: rgba(233, 231, 231, 0.9)" margin-top:20px; width:100%" class=" d-flex row justify-content-center align-items-center">
        <img src="teach.svg " style="display: inline; margin-right:auto margin_left:auto; width:550px" >
        <p>ssdfkjfsmo</p>
    </div-->
@endsection
