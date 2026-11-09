@extends('admin.layouts.master')
@section('title','ایجاد کاربر جدید ')


@section('content')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">  &#x1F464;  افزودن کاربر جدید</h5>
            </div>
            <form action="{{route('admin.user.client.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="row">

                            <div class="mb-3 col col-md-6">
                                <label class="form-label">نام کاربری </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                           <div class="mb-3 col col-md-6">
                                <label class="form-label"> ایمیل  </label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                           <div class="mb-3 col col-md-6">
                                <label class="form-label"> موبایل  </label>
                                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                            <div class="mb-3 col col-md-6">
                                  <label class="form-label">وضعیت فعال سازی</label>
                                  <select name="activation"class="form-select form-control-sm">
                                    <option value="0" @if(old('activation') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('activation') == 1) selected @endif>فعال</option>
                                  </select>
                                  @error('status')
                                      <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                                  @enderror
                            </div>

                           <div class="mb-3 col col-md-6">
                                <label class="form-label">رمز عبور  </label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                           <div class="mb-3 col col-md-6">
                                <label class="form-label">تکرار رمز عبور  </label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                        </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.user.client.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">&#x1F4BE; ذخیره</button>
                </div>
            </form>
        </div>

@endsection


