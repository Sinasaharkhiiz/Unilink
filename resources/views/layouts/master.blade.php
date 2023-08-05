<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
       

        <!-- Bootstrap -->
        <link href="{{ asset('/css/bootstrap.rtl.css') }}" rel="stylesheet">
        
        <!-- Additional CSS -->
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

        
    </head>
    <title>
        @yield('title')
    </title>
    <body>
        <nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home"><svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true"width="20" height="20" focusable="false" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                      <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                    </svg>صفحه اصلی</a>
                  </li>
                </ul>
                <form class="d-flex" role="search" style="margin-left: auto; margin-right: 40px;" >
                  <input class="form-control me-2" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search" style="width: 326px">
                  <button class="btn btn-outline-primary" type="submit">جستجو</button>
                </form>
                @if (Auth::check())
                <li>
                  <a class="navbar-brand" href="logout">خروج</a>
                </li>
                @else
                <ul class="navbar-nav" style="margin-left: 40px;">
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
    

 @yield('content')

 <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
</body>
   
        

