@extends('layouts.master')

@section('title')
    درخواست تدریس
@endsection
<style>
    .vl {
      border-left: 3px solid rgb(219, 223, 219 );
      height: 70px;
      margin-left: 25px;
      margin-right: 25px;

    }
    .lds-ring,
    .lds-ring div {
      box-sizing: border-box;
    }
    .lds-ring {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
    }
    .lds-ring div {
      box-sizing: border-box;
      display: block;
      position: absolute;
      width: 64px;
      height: 64px;
      margin: 8px;
      border: 8px solid currentColor;
      border-radius: 50%;
      animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
      border-color: currentColor transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
      animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
      animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
      animation-delay: -0.15s;
    }
    @keyframes lds-ring {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    </style>


@section('content')
@if ($tech->teach == null)
    @php
        $level = 2
    @endphp
@else
    @php
        $level = $tech->teach->level
    @endphp
@endif



<div class="col-lg-6 mx-auto" data-bs-theme="dark" style="margin-top: 100px">

    <div class="card">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                <div class="col" @if (Auth::user()->profile=="") style="color: #f5f9fa" @else style="color: #20c997" @endif>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg>
                  <p style="font-size: 20px"> 1) تکمیل پروفایل </p>
            </div>
        </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"  @if (Auth::user()->profile=="") disabled @endif>
                <div class="col " @if (Auth::user()->profile=="") style="color: #6c757d" @elseif ($level == 2) style="color: #f5f9fa" @elseif ($level > 2) style="color: #20c997" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-envelope-arrow-up" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4.5a.5.5 0 0 1-1 0V5.383l-7 4.2-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-1.99zm1 7.105 4.708-2.897L1 5.383zM1 4v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1"/>
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354 1.25 1.25a.5.5 0 0 1-.708.708L13 12.207V14a.5.5 0 0 1-1 0v-1.717l-.28.305a.5.5 0 0 1-.737-.676l1.149-1.25a.5.5 0 0 1 .722-.016"/>
                      </svg>
                      <p style="font-size: 20px"> 2) ثبت درخواست </p>
                </div>
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" @if($level <3) disabled @endif>
                <div class="col" @if($level<3) style="color: #6c757d" @elseif ($level==3) style="color: #f5f9fa" @elseif($level==4) style="color: #c92028"  @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                      </svg>
                      <p style="font-size: 20px"> 3) بررسی درخواست و نتیجه نهایی </p>
                </div>
              </button>
            </li>
            <!--
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pass-tab" data-bs-toggle="tab" data-bs-target="#pass-tab-pane" type="button" role="tab" aria-controls="pass-tab-pane" aria-selected="false" @if($level <4) disabled @endif>
                    <div class="col" @if($level<4) style="color: #6c757d" @elseif ($level==4) style="color: #f5f9fa" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                            <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
                            <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z"/>
                            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                          </svg>
                          <p style="font-size: 20px"> 4) نتیجه نهایی  </p>
                    </div>
                </button>
              </li> -->
          </ul>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="card-body">
                    <div style="width:100%; height:300px" class=" d-flex  justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                          </svg>
                        <div class="vl" ></div>
                        <a href="edit_profile" class="nav-link"><h2 class="text-light">جهت تکمیل پروفایل کلیک کنید</h2></a>
                    </div>

                 </div>
             </div>




            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="card-body">
                    <h2 dir="rt" class="d-flex justify-content-center"> قوانین و مقررات :</h2>
                    <hr class="text-light">
                        <h6>
                        1. تعهد به محتوای مرتبط و اصولی: مدرسان باید مطمئن شوند که محتوای آموزشی آن‌ها مرتبط، دقیق و اصولی است.
                        </h6><h6>
                        2. ممنوعیت از محتوای ناسازگار: مدرسان باید از استفاده از محتوای ناسازگار با قوانین سایت، مانند محتوای محافظه‌کارانه یا تبلیغاتی، خودداری کنند.
                        </h6><h6>
                        3. احترام به حقوق مالکیت فکری: مدرسان باید اطمینان حاصل کنند که مطالب آموزشی آن‌ها مجاز به انتشار است و حقوق مالکیت فکری دیگران را رعایت می‌کنند.
                        </h6><h6>
                        4. تعهد به کیفیت و تعامل با دانشجویان: مدرسان باید به تعامل با دانشجویان، پاسخ به سوالات و ارائه بازخورد به آن‌ها توجه کنند.
                        </h6><h6>
                        5. مدیریت مناسب وقت و تلاش: مدرسان باید وقت کافی را برای آماده‌سازی و ارائه محتوا اختصاص دهند و از کیفیت آن اطمینان حاصل کنند.
                        </h6><h6>
                        6. رعایت قوانین امنیتی و حریم خصوصی: مدرسان باید اطلاعات شخصی دانشجویان را محافظت کرده و از هرگونه نقض امنیت و حریم خصوصی خودداری کنند.
                        </h6>
                    <hr class="text-light">
                    <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                          <label class="form-check-label" for="invalidCheck2">
                            قوانین را مطالعه کرده و آنها را می پذیرم.
                          </label>
                        </div>
                      </div>

                        <form class="needs-validation" style="display: inline" novalidate method="post" action="teach_req" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="u_id" class="form-control" id="re-name" value="{{Auth::user()->id}}" readonly hidden>
                            <div class="d-grid gap-2">
                            <button class="btn btn-light" id="myButton" disabled type="submit" style="margin-top:5px">تاید نهایی و ارسال درخواست</button>
                            </div>
                        </form>


                    </div>
                </div>

            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="card-body" >
                    <div style="width:100%; height:300px" class=" d-flex  justify-content-center align-items-center">

                        @if($level<4)
                        <img src="pic2.png " style=" width: 100px;">
                        <div class="vl" ></div>
                        <h4 class="text-light mb-1">درخوسات شما درحال بررسی می باشد. </h4>
                        @elseif ($level==4)

                        <h4 class="text-light mb-1">کارشناسان شرکت UniLink با درخواست تدریس شما مخالفت کرده اند. دلیل رد درخوسات تدریس شما : {{$tech->teach->text}} </h4>

                        @elseif ($level==5)
                        <img src="pic2.png " style=" width: 100px;">
                        <div class="vl" ></div>
                        <h4 class="text-success mb-1">تبریک! درخواست شما با موفقیت پذیرفته شده است.  </h4>
                        @endif
                    </div>
            </div>
            </div>

            <div class="tab-pane fade" id="pass-tab-pane" role="tabpanel" aria-labelledby="pass-tab" tabindex="0">
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" action="update_user_password" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="user_id" class="form-control" id="re-name"  readonly hidden>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="old_pass" class="col-form-label">رمز عبور فعلی :</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="password" name="old_pass" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label for="new_pass" class="col-form-label">رمز عبور جدید :</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="password" name="new_pass" class="form-control">
                            </div>

                            </div>

                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-outline-light px-4" value="اعمال تغییرات">
                        </div>
                    </div>
                </div>
            </form>
            </div>

          </div>

    </div>
</div>
<script>
const myCheckbox = document.getElementById('invalidCheck2');
const myButton = document.getElementById('myButton');

myCheckbox.addEventListener('change', function() {
  if (myCheckbox.checked) {
    // Checkbox is checked, enable the button
    myButton.removeAttribute('disabled');
  } else {
    // Checkbox is not checked, disable the button
    myButton.setAttribute('disabled', true);
  }
});

</script>

@endsection
