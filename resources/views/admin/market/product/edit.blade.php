@extends('admin.layouts.master')
@section('title','ویرایش  دسته بندی ')


@section('content')

                <div class="modal-content">
            <div class="modal-header">
                <h5 class="">&#x1F4C1; ویرایش دسته‌بندی</h5>
            </div>
            <form action="{{route('admin.market.category.update',$category)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col col-md-5">
                                <label class="form-label">نام دسته</label>
                                <input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}">
                               @error('name')
                                 <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                               @enderror
                        </div>


                        <div class="mb-3 col col-md-4">
                            <label class="form-label">انتخاب دسته بندی</label>
                            <select class="form-select" name="parent_id">
                                <option value="">دسته اصلی</option>
                                @foreach ($categories as $subCategory)
                                    <option value="{{ $subCategory->id}}"  @if(old('parent_id',$category->parent_id) == $subCategory->id) selected @endif>{{ $subCategory->name}}</option>
                                @endforeach
                            </select>
                               @error('parent_id')
                                 <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                               @enderror
                        </div>

                        <div class="mb-3 col col-md-3">
                            <label class="form-label">وضعیت</label>
                            <select class="form-select" name="status">
                                <option value="0"  @if(old('status',$category->status) == "0") selected @endif>غیر فعال</option>
                                <option value="1"  @if(old('status',$category->status) == "1") selected @endif>فعال</option>
                            </select>
                            @error('status')
                                 <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label class="form-label">توضیحات</label>
                            <textarea class="form-control" rows="3"  name="description" id="description">{{old('description',$category->description)}} </textarea>
                            @error('description')
                               <span class="p-1 py-3 my-3 text-danger rounded"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.market.category.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">&#x1F4BE; بروزرسانی</button>
                </div>
            </form>
        </div>


@endsection



 @section('scripts')
        <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('description');
        </script>
@endsection
