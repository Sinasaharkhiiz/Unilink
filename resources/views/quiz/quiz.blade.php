@extends('layouts.master')
@section('title')
quiz
@endsection
@section('content')
<style>

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
<div class="container" style="margin-top: 100px" data-bs-theme="dark">
    <div class="main-body" style="margin-right:auto;margin-left:auto">
        <div style="width:100%; margin-bottom:15px;" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
            <label class="form-label text-light" for="ordering" style="font-size: 20px"> <b>نوع مسابقه : </b> </label>
            <form action="">
            <select class="form-select "  onchange="this.form.submit()" aria-label="Default select example" style="width: 150px" name="order" id="ordering">
                <option selected></option>
                <option value="newest">Python</option>
                <option value="cheapest">Html</option>
                <option value="oldest">PHP</option>
              </select>
              <input type="hidden" name="search" value="{{ request()->search }}" />
            </form>
            </div>
        <div class="d-flex justify-content-center" >
            <div class="col-lg-10">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="align-items-center text-center" style="display: inline-block;">
                            <img src="{{'storage/'.$u_data->avatar}}" alt="Admin" class="rounded-circle p-1 bg-light" width="110">
                            <div class="mt-3">
                                <h4 class="text-light mb-1">{{$u_data->name}}</h4>
                                <p class="text-secondary mb-1">@if($u_data->profile!=null) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                  </svg> {{$u_data->profile->job}} @endif</p>
                                <p class="text-secondary font-size-sm">@if($u_data->profile!=null) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                  </svg>
                                  {{$u_data->profile->state}} @endif</p>
                            </div>
                        </div>
                        <img src="vs.png" alt="vs" style="width: 50px;height:50xp;">

                        <div class=" align-items-center text-center" style="display: inline-block;">
                            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                            <div class="mt-3">
                                <h4 class="text-light mb-1">در حال جستجو </h4>

                            </div>
                        </div>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-center "><a href="test">
                        <button class="btn btn-outline-light"> ادامه مسابقه </button>
                    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

