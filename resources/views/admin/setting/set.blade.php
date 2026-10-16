

@extends('admin.layouts.master')
@section('title', 'تنظیمات سایت ')

@section('content')

        <div class="">
            <div class="modal-header">
                 @if ($setting)
                     <h5 class="">&#9965;  ویرایش  تنظیمات </h5>
                @else
                     <h5 class=""> &#9965;  افزودن تنظیمات </h5>
                @endif
            </div>


            <form action="{{  route('admin.setting.set.store') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="mb-3 col col-md-12">
                            <label class="form-label">  عنوان </label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $setting->title ?? '') }}">
                            @error('title')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                       </div>


                        <div class="mb-3 col col-md-12">
                            <label class="form-label">  کلمات کلیدی </label>
                            <input type="text" class="form-control" name="keywords" value="{{ old('keywords', $setting->keywords ?? '') }}">
                            @error('keywords')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                       </div>


                        <div class="mb-3 col col-md-12">
                            <label class="form-label">    توضیحات </label>
                            <input type="text" class="form-control" name="description"  value="{{ old('description', $setting->description ?? '') }}">
                            @error('description')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                       </div>


                    <div class="mb-3 col col-12 col-lg-6">
                        <label class="form-label">لوگو </label>
                        <div class="product-file-upload" onclick="document.getElementById('logoFileInput').click()">
                            <div class="product-file-icon">🖼️</div>
                            <div class="product-file-text">
                                <div class="product-file-title">   لوگو سایت را انتخاب کنید </div>
                                <div class="product-file-hint">پسوندهای مجاز :png, jpeg, jpg, gif </div>
                            </div>
                            <input type="file" id="logoFileInput" name="logo">
                        </div>
                        <img src="{{ asset($setting->logo ?? '') }}" alt="" style="width: 300px;margin-top: 9px;;height:230px">
                    </div>


                   <div class="mb-3 col col-12 col-lg-6">
                        <label class="form-label">آیکن </label>
                        <div class="product-file-upload" onclick="document.getElementById('iconFileInput').click()">
                            <div class="product-file-icon">🖼️</div>
                            <div class="product-file-text">
                                <div class="product-file-title">  آیکن سایت را انتخاب کنید  </div>
                                <div class="product-file-hint">پسوندهای مجاز :png, jpeg, jpg, gif </div>
                            </div>
                            <input type="file" id="iconFileInput" name="icon">
                        </div>

                             <img src="{{ asset($setting->icon ?? '') }}" alt="" style="width: 300px;margin-top: 9px;height:230px">
                    </div>


                    </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.setting.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">
                        <span class="">&#x1F4BE;</span>
                         ذخیره
                     </button>
                </div>
            </form>
        </div>


@endsection
