<?php use App\Models\User; ?>
@extends('layouts.master')

@section('title')
{{$c_data->name}}
@endsection

@section('content')


<div class="container" style="margin-top: 100px">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <h3 class="mb-0 text-light">{{$c_data->name}}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h5 class="mb-0 text-light">خلاصه ای از جزوه:</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 class="mb-0" style="color: darkgray">{{$c_data->description}}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <h5 class="mb-0 text-light">قیمت:</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 class="mb-0" style="color: darkgray">
                                @if($c_data->price==0)
                                    <p><strong class="text-success"> رایگان </strong></p>
                                @else
                                    <p><strong>{{"قیمت :".$c_data->price." "."تومان"}}</strong></p>
                                @endif
                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary" id="comments">
                                @if ($Check_student)

                                <form method="POST" action="{{"storage/".$c_data->content}}" style="display: inline">
                                    @csrf
                                <button type="submit" class="btn btn-success" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                  </svg> بارگیری جزوه</button>
                                </form>

                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">نظر دادن </button>
                                <form class="needs-validation" novalidate method="post" action="course/{id}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-theme="dark">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">نظر جدید</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form>
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">جزوه:</label>
                                            <input type="text" class="form-control" id="recipient-name" value="{{$c_data->name}}" readonly>
                                            <input type="text" name="c_id" class="form-control" id="re-name" value="{{$c_data->id}}" readonly hidden>

                                          </div>
                                          <div class="mb-3">
                                            <label for="message-text" class="col-form-label">امتیاز:</label>
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="display:block">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" checked>
                                                <label class="btn btn-outline-light" style=" width: 66px; " for="btnradio5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                  </svg> 5 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 66px; " for="btnradio4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                  </svg> 4 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 66px; " for="btnradio3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16"  style="margin-bottom: 5px;">
                                                    <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                                  </svg> 3 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 66px; " for="btnradio2"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                  </svg> 2 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 66px; " for="btnradio1"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                  </svg> 1 </label>
                                              </div>

                                          </div>
                                          <div class="mb-3">
                                            <label for="message-text" class="col-form-label">نظر:</label>
                                            <textarea class="form-control" name="comment" id="message-text" required></textarea>
                                          </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer" style="flex-direction: row-reverse">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">بازگشت</button>
                                        <button type="submit" class="btn btn-light">ارسال</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>

                                @else
                                <form class="needs-validation" style="display: inline" novalidate method="post" action="buy_course" enctype="multipart/form-data">
                                    @csrf
                                <input type="text" name="c_id" class="form-control" id="re-name" value="{{$c_data->id}}" readonly hidden>
                                <input type="submit" class="btn btn-success px-4" value="افزودن به سبد خرید">
                                </form>
                                @endif




                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="row">
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
                </div> -->
            </div>


            <div class="col-lg-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{'storage/'.$p_data->avatar}}" alt="Admin" class="rounded-circle p-1 bg-light" width="110">
                            <div class="mt-3">
                                <h4 class="text-light">{{$p_data->name}}</h4>
                                <p class="text-secondary mb-1">منتشر کننده</p>
                                <!--
                                <hr>
                                <p class="text-secondary font-size-sm">Bay Area, San Francisco, CA</p>
                                <button class="btn btn-primary">Follow</button>
                                <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                        </div>
                        <!--
                        <hr class="my-4">

                         <ul class="list-group list-group-flush bg-dark">
                            <li class="list-group-item bg-primary d-flex justify-content-between align-items-center flex-wrap">
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
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="text-light" id="comments">
    <div class="col-lg-8">
        <div style="background-color: rgba(22, 24, 22, 0.6); border-radius: 10px" >
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h3 class="mb-0 text-light">نظرات:</h3>
                    </div>
                </div>
                @if($co_data->total() != 0)
                @foreach ($co_data as $key => $value)
                <div class="row mb-3">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10 text-secondary" style="padding-bottom: 20px">
                        <div class="mb-0" style="background-color: rgba(22, 24, 22, 0.9); border-radius: 10px">
                            <?php $sender = User::find($value->sender_id)?>
                            <div style="margin-right: 10px">{{$sender->name}}</div>
                            <br>
                            <h5 class="text-light" style="margin-right: 20px">{{$value->comment}}</h5>
                            @if (Auth::user()->id == $value->sender_id)
                            <br>
                            <div style="margin-right: 20px">
                                <form class="needs-validation" id="delete_comment" novalidate method="post" action="delete_comment/{id}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="com_id" class="form-control" id="re-name" value="{{$value->id}}" readonly hidden>
                                    <input type="text" name="cou_id" class="form-control" id="re-name" value="{{ request('id')}}" readonly hidden>
                                <a type="submit" onclick="document.getElementById('delete_comment').submit();"><div class="text-danger" style="display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><title>حذف</title>
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                  </svg></div></a>
                                  <div class="vl" style="display: inline-flex"></div>
                                  <a href=""><div class="text-light" style="display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><title>ویرایش</title>
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg></div></a>
                                </form>
                            </div>
                            @endif
                            <div style="text-align: left; margin-left: 10px">
                                {{jdate($value->created_at)->ago()}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div style="width:100%; height:100px" class=" d-flex  justify-content-center align-items-center">
                    <h3 class="text-light">نظری درباره این جزوه ثبت نشده است. </h3>
                  </div>
                @endif
            </div>
            {{$co_data->appends(['id' => request('id')])->fragment('comments')->links('vendor.pagination.bootstrap-5')}}
        </div>
    </div>

</div>





@endsection
