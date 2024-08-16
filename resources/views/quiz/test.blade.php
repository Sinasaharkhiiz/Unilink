<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuizApp</title>
  <link rel="stylesheet" href="{{ asset('/css/quiz/index.css')}}">
  <link href="{{ asset('/css/bootstrap.rtl.css') }}" rel="stylesheet">
  <link

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar fixed-top bg-primary navbar-expand-lg bg-body-tertiary" style="margin-bottom: 40px; opacity: .90 !important;" data-bs-theme="dark" >
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="width: 100px">
              <br>
              <li class="nav-item">
                <a class="navbar-brand active" aria-current="page" href="home"><img src="logo.png" alt="unilink" style="width: 100px;"></a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  منابع آموزشی                 </a>
                <ul class="dropdown-menu" >
                  <li><a class="dropdown-item" href="courses">جزوات آموزشی</a></li>
                  <li><a class="dropdown-item" href="#">دوره های آموزشی</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="quiz">مسابقه</a>
              </li>
            </li>
            <li class="nav-item">
            @if (Auth::check())
              @if (Auth::user()->role=='student')
              <a class="nav-link" aria-current="page" href="teach">تدریس</a>
              @else
              <a class="nav-link" aria-current="page" href="add_course">افزودن‌جزوه</a>
              @endif
            @else
            <a class="nav-link" aria-current="page" href="teach">تدریس</a>
            @endif
            </li>
            </ul>
            <!--
            <form class="d-flex" role="search" method="GET" style="margin-left: auto; " >
              <input class="form-control me-2" type="search" name="search" placeholder="دنبال چی میگردی؟"   value="{{ request('search') }}" aria-label="Search" style="width: 276px">
              <button class="btn btn-outline-info" type="submit">جستجو</button>
            </form>-->
            @if (Auth::check())
            <ul class="navbar-nav  dropstart" >



              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " aria-labelledby="dropdownMenu2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth::user()->name}}  </a>
                <ul class="dropdown-menu" >
                  <li><a class="dropdown-item" href="profile"> <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                  </svg> پنل کاربری </a></li>
                  <li><hr class="dropdown-divider"></li>
                  @if (Auth::user()->role=='super_admin')
                  <li><a class="dropdown-item" href="adminpanel"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                  </svg> پنل ادمین </a></li>
                  <li><hr class="dropdown-divider"></li>
                  @endif
                  <li>
                    <a class="dropdown-item" href="#" role="button" data-bs-toggle="modal" data-bs-target="#shopModal" >
                      <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg> سبد خرید   </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="chatify">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-chat-quote-fill" viewBox="0 0 16 16">
                        <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M7.194 6.766a1.7 1.7 0 0 0-.227-.272 1.5 1.5 0 0 0-.469-.324l-.008-.004A1.8 1.8 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.5 2.5 0 0 0-.227-.4zM11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.5 2.5 0 0 0-.228-.4 1.7 1.7 0 0 0-.227-.273 1.5 1.5 0 0 0-.469-.324l-.008-.004A1.8 1.8 0 0 0 10.07 6c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
                      </svg> پیام رسان</a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                  </svg> خروج</a></li>
                </ul>
              </li>
              </ul>
            @else
            <ul class="navbar-nav dropstart" >
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ورود/ثبت نام                  </a>
              <ul class="dropdown-menu" >
                <li><a class="dropdown-item" href="login">ورود</a></li>
                <li><a class="dropdown-item" href="register">ثبت نام</a></li>
              </ul>
            </li>
            </ul>
            @endif

          </div>
        </div>
      </nav>
  <div class="start_btn btn btn-outline-light"><button>شروع مسابقه</button></div>

  <div class="info_box">
    <div class="info-title"><span>برخی از قوانین این مسابقه</span></div>
    <div class="info-list">
      <div class="info">1. برای هر سوال فقط <span>15 ثانیه</span> زمان خواهید داشت.</div>
      <div class="info">2. هنگامی که پاسخ خود را انتخاب کردید، قابل بازگشت نیست.</div>
      <div class="info">3. بعد از اتمام زمان نمی توانید هیچ گزینه ای را انتخاب کنید.</div>
      <div class="info">4. در حین بازی نمی توانید از مسابقه خارج شوید. </div>
      <div class="info">5. بر اساس پاسخ صحیح خود امتیاز دریافت خواهید کرد.</div>
    </div>
    <div class="buttons">
        <button class="restart"><b>شروع</b></button>
      <button class="quit">خروج</button>

    </div>
  </div>

  <div class="quiz_box">
    <header style="background-color: rgba(43, 48, 53, 1)">
      <div class="title"> <img src="logo.png" alt="unilink" style="width: 100px;"></div>
      <div class="timer">
        <div class="time_left_txt">زمان باقی مانده</div>
        <div class="timer_sec">15</div>
      </div>
      <div class="time_line"></div>
    </header>
    <section>
      <div class="que_text">

      </div>
      <div class="option_list">

      </div>
    </section>

    <footer>
      <div class="total_que">

      </div>
      <button class="next_btn">سوال بعدی</button>
  </footer>
  </div>



    <div class="result_box">
      <div class="icon">
        <i class="bi bi-trophy-fill text-warning"></i>
      </div>
      <div class="complete_text">شما امتحان را تکمیل کردید !</div>
      <div class="score_text">

      </div>
      <div class="buttons">

        <button class="restart">تکرار مسابقه</button>
        <button class="quit">ترک مسابقه</button>
      </div>
    </div>

</body>
<script src="{{ asset('/js/quiz/index-Questions.js')}}"></script>
<script src="{{ asset('/js/quiz/index.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

<script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
</html>

