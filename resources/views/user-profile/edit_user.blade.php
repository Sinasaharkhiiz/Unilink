<?php use Illuminate\Support\Facades\Auth;?>
@extends('layouts.master')

@section('title')
    ویرایش کاربر
@endsection


@section('content')

<style>
    .nav{
        --bs-nav-link-color: #718096;
    }
</style>
<div class="container" style="margin-top: 100px" data-bs-theme="dark">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{'storage/'.$u_data->avatar}}" alt="Admin" class="rounded-circle p-1 bg-light" width="110">
                            <div class="mt-3">
                                <h4 class="text-light mb-1">{{$u_data->name}}</h4>
                                <hr>
                                <p class="text-secondary mb-1">@if($u_data->profile!=null) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                  </svg> {{$u_data->profile->job}} @endif</p>
                                <p class="text-secondary font-size-sm">@if($u_data->profile!=null) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                  </svg>
                                  {{$u_data->profile->state}} @endif</p>
                                {{--
                                <p class="text-secondary mb-1">Full Stack Developer</p>
                                <p class="text-secondary font-size-sm">Bay Area, San Francisco, CA</p>
                                --}}
                                <a href="{{asset("chatify/".$u_data->id)}}"><button class="btn btn-outline-light" >Message</button> </a>
                            </div>
                        </div>
                        <hr class="my-4">
                        {{--
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                <span class="text-secondary">https://bootdey.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                <span class="text-secondary">@bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="card">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">حساب کاربری</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">مشخصات فردی</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">راه های ارتباطی</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pass-tab" data-bs-toggle="tab" data-bs-target="#pass-tab-pane" type="button" role="tab" aria-controls="pass-tab-pane" aria-selected="false">رمز عبور</button>
                          </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="card-body">
                            <form class="needs-validation" novalidate method="POST" action="update_user" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
                                <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">نام و نام خانوادگی:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="u_name" class="form-control" value="{{$u_data->name}}" @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ایمیل:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control" value="{{$u_data->email}}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">شماره همراه:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="+989254863215" @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <label for="avatar" class="form-label">تصویر پروفایل : </label>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input accept=".gif,.jpg,.jpeg,.GIF,.png,.PNG,.JPG,.JPEG,.bmp,.BMP" class="form-control" name="avatar" type="file" id="avatar" placeholder=".png">
                                </div>
                                <div class="invalid-feedback">
                                  Valid avatar is required.
                                </div>
                              </div>
                            @if(Auth::user()->role=="super_admin")
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">نقش:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option selected value="{{$u_data->role}}">{{$u_data->role}}</option>
                                        @if($u_data->role!='student')<option value="student">student</option>@endif
                                        @if($u_data->role!='teacher')<option value="teacher">teacher</option>@endif
                                        @if($u_data->role!='admin')<option value="admin">admin</option>@endif
                                        @if($u_data->role!='super_admin')<option value="super_admin">super_admin</option>@endif
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-outline-light px-4" value="اعمال تغییرات">
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>




                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST" action="update_profile" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
                                    <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="job" class="col-form-label">شغل یا حرفه :</label>
                                    </div>
                                    <div class="col-sm-4 text-secondary">
                                        <input type="text" name="job" class="form-control" placeholder="Full Stack Developer" @if(Auth::user()->id!=$u_data->id) readonly @endif  @if($u_data->profile!=null) value='{{$u_data->profile->job}}' @endif>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="state" class="col-form-label">استان :</label>
                                    </div>
                                    <div class="col-sm-4 text-secondary">
                                        <select class="form-select" id="state" required name="state">
                                            <option selected  @if($u_data->profile!=null)value="{{$u_data->profile->state}}" @endif>@if($u_data->profile!=null) {{$u_data->profile->state}} @endif</option>
                                            <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                                            <option value="آذربایجان غربی">آذربایجان غربی</option>
                                            <option value="اردبیل">اردبیل</option>
                                            <option value="اصفهان">اصفهان</option>
                                            <option value="البرز">البرز</option>
		                                    <option value="ایلام">ایلام</option>
		                                    <option value="بوشهر">بوشهر</option>
                                            <option value="تهران">تهران</option>
		                                    <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
		                                    <option value="خراسان جنوبی">خراسان جنوبی</option>
		                                    <option value="خراسان رضوی">خراسان رضوی</option>
		                                    <option value="خراسان شمالی">خراسان شمالی</option>
		                                    <option value="خوزستان">خوزستان</option>
		                                    <option value="زنجان">زنجان</option>
		                                    <option value="سمنان">سمنان</option>
		                                    <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
		                                    <option value="فارس">فارس</option>
		                                    <option value="قزوین">قزوین</option>
		                                    <option value="قم">قم</option>
		                                    <option value="کردستان">کردستان</option>
		                                    <option value="کرمان">کرمان</option>
		                                    <option value="کرمانشاه">کرمانشاه</option>
		                                    <option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
		                                    <option value="گلستان">گلستان</option>
		                                    <option value="گیلان">گیلان</option>
		                                    <option value="لرستان">لرستان</option>
		                                    <option value="مازندران">مازندران</option>
		                                    <option value="مرکزی">مرکزی</option>
		                                    <option value="هرمزگان">هرمزگان</option>
		                                    <option value="همدان">همدان</option>
		                                    <option value="یزد">یزد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="about" class="form-label">درباره من :</label>
                                    </div>

                                    <div class="col-sm-10 text-secondary">
                                        <textarea name="about"  class="form-control" placeholder="توضیحی مختصر در مورد خودتان و حرفه ای که در آن تخصص دارید." id="about" rows="4">@if($u_data->profile!=null) {{$u_data->profile->about}} @endif</textarea>
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

                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST" action="update_user_contact" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="website" class="col-form-label">وبسایت :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="website" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="github" class="col-form-label">گیت هاب : </label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="github" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        </div>

                                        <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="linkedin" class="col-form-label">لینکدین :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="linkedin" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="telegram" class="col-form-label"> تلگرام :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="telegram" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        </div>

                                          <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="instagram" class="col-form-label">اینستاگرام :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="instagram" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="twitter" class="col-form-label"> توییتر (X) :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="twitter" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
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

                        <div class="tab-pane fade" id="pass-tab-pane" role="tabpanel" aria-labelledby="pass-tab" tabindex="0">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST" action="update_user_password" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
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
                {{--
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                <p>Web Design</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Website Markup</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>One Page</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Mobile Template</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Backend API</p>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>
</div>

@endsection
