@extends('layouts.master')

@section('title')
    افزودن جزوه
@endsection


@section('content')
<div class="container">
    <style>
        body {
            color : #ffffff;
        }
    </style>
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-1 "  src="/pic2.png" alt="" width="250" >
        <h2>جزوه آموزشی</h2>
       <!-- <p class="lead">مشخصات جزوه را پر کنید ، شما می توانید جزوه را به صورت رایگان یا نقدی به اشتراک بگذارید</p> -->
      </div>

      <div class="row g-5" style="display: flex;justify-content: center; background-color: rgba(22, 24, 22, 0.5)">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">مشخصات جزوه</h4>
          <form class="needs-validation" novalidate method="post" action="add_course" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="name" class="form-label">عنوان</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="price" class="form-label">قیمت</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid price is required.
                </div>
              </div>

              <div class="col-12">
                <label for="description" class="form-label">خلاصه</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="خلاصه کوتاهی از جزوه" value="" required>
                <div class="invalid-feedback">
                  Valid description is required.
                </div>
              </div>

              <div class="col-6">
                <label for="content" class="form-label">بارگذاری جزوه</label>
                <input class="form-control" accept=".pdf" name="content" type="file" id="content">
                <div class="invalid-feedback">
                  Valid content is required.
                </div>
              </div>
              <div class="col-6">
                <label for="cover" class="form-label">کاور جزوه <span >(اختیاری)</span></label>
                <input class="form-control" accept=".gif,.jpg,.jpeg,.GIF,.png,.PNG,.JPG,.JPEG,.bmp,.BMP" name="cover" type="file" id="cover" placeholder=".png">
                <div class="invalid-feedback">
                  Valid cover is required.
                </div>
              </div>

              <hr>
            <button class="w-100 btn btn-outline-light btn-lg" type="submit" style="margin-bottom: 25px">تایید نهایی و اشترک جزوه</button>
          </form>
        </div>
      </div>
    </main>
  </div>
    @endsection



