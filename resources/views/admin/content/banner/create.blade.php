@extends('admin.layouts.master')
@section('title','ایجاد  بنر ')

@section('style')
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="{{asset('admin-assets/persianDatePicker/persian-datepicker.css')}}">
@endsection

@section('content')

        <div class="">
            <div class="modal-header">
                <h5 class="">&#128276; ایجاد بنر</h5>
            </div>
            <form action="{{  route('admin.content.banner.store') }}" method="post">
                @csrf
                <div class="modal-body">

                       <div class="row">
                             <div class="mb-3 col col-md-6">
                                <label class="form-label">عنوان بنر</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                @error('title')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                                @enderror
                            </div>

                            <div class="mb-3 col col-md-6">
                                <label class="form-label"> آدرس </label>
                                <input type="text" class="form-control" name="link_url" value="{{old('link_url')}}">
                                @error('link_url')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                                @enderror
                            </div>

                             <div class="mb-3 col col-md-2">
                                <label class="form-label">متن بج </label>
                                <input type="text" class="form-control" name="badge_text" value="{{old('badge_text')}}">
                                @error('badge_text')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                                @enderror
                            </div>

                             <div class="mb-3 col col-md-2">
                                <label class="form-label">آیکن بج</label>
                                <input type="text" class="form-control" name="badge_icon" value="{{old('badge_icon')}}">
                                @error('badge_icon')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                                @enderror
                            </div>


                             <div class="mt-2 col col-md-2">
                                <label class="form-label"> پس زمینه بج </label>
                                <input type="color" class="form-control" name="badge_color" value="{{old('badge_color')}}">
                                @error('badge_color')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                                @enderror
                            </div>


                        <div class="form-group mt-2  col col-12 col-md-2">
                            <label> زمان پایان تخفیف:</label>
                            <input type="text"  id="expire_at_display" class="form-control" placeholder="انتخاب تاریخ و ساعت..." readonly>

                            <input type="hidden" name="expire_at" id="expire_at_gregorian">

                            @error('expire_at')
                                <span style="color: #ef4444; font-size: 12px; margin-top: 5px; display:block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col col-md-2">
                            <label class="form-label">وضعیت</label>
                            <select class="form-select" name="status">
                                <option value="0"  @if(old('status') == "0") selected @endif>غیرفعال</option>
                                <option value="1"  @if(old('status') == "1") selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>


                        <div class="mb-3 col col-md-2">
                            <label class="form-label"> موقعیت</label>
                            <select class="form-select" name="position">
                                <option value="0"  @if(old('position') == "0") selected @endif>بنر - بالا صفحه ی اصلی </option>
                                <option value="1"  @if(old('position') == "1") selected @endif> بنر - وسط صفحه ی اصلی   </option>
                            </select>
                            @error('position')
                                <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>



                        <div class="mb-3 col col-md-12">
                            <label class="form-label">توضیحات بنر</label>
                            <input type="text" class="form-control" name="description" value="{{old('description')}}">
                            @error('description')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.content.banner.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">
                        <span class="">&#x1F4BE;</span>
                         ذخیره
                     </button>
                </div>
            </form>
        </div>


@endsection



@section('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script  src="{{asset('admin-assets/persianDatePicker/persian-datepicker.js')}}"></script>


@endsection
