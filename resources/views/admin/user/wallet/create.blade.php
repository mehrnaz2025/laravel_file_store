@extends('admin.layouts.master')

@section('title','ایجاد سطح دسترسی ')

@section('content')


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">🏷️ ایجاد سطح دسترسی</h5>
            </div>
            <form action="{{route('admin.user.permission.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col col-md-6">
                                <label class="form-label"> نام مجوز(انگلیسی)</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                               @error('name')
                                 <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                               @enderror
                        </div>

                        <div class="mb-3 col col-md-6">
                                <label class="form-label"> توضیحات  </label>
                                <input type="text" class="form-control" name="description" value="{{old('description')}}">
                               @error('description')
                                 <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                               @enderror
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.user.permission.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">💾 ذخیره</button>
                </div>
            </form>
        </div>


@endsection
