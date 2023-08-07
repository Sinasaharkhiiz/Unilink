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
                    <a class="navbar-brand active" aria-current="page" href="home">Unilnk</a>
                  </li>
                </ul>
                <form class="d-flex" role="search" style="margin-left: auto; margin-right: 40px;" >
                  <input class="form-control me-2" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search" style="width: 326px">
                  <button class="btn btn-outline-primary" type="submit">جستجو</button>
                </form>
                @if (Auth::check())
                <li>
                  <a class="navbar-brand" href="logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                  </svg></a>
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
   
        

