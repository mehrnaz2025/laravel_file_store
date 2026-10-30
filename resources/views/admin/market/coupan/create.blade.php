@extends('admin.layouts.master')
@section('title','ایجاد محصول ')


@section('content')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">&#128214; /&#127911; افزودن محصول</h5>
            </div>
            <form action="{{route('admin.market.product.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="row">

                            <div class="mb-3 col col-md-6">
                                <label class="form-label">نام محصول</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-3">
                                <label class="form-label"> گوینده</label>
                                <input type="text" class="form-control" name="speaker" value="{{ old('speaker') }}">
                                @error('speaker')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-3">
                                <label class="form-label"> نویسنده</label>
                                <input type="text" class="form-control" name="auther" value="{{ old('auther') }}">
                                @error('auther')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                            <div class="mb-3 col col-md-3">
                                <label class="form-label"> قیمت</label>
                                <input type="number"   min="1" class="form-control" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                            <div class="mb-3 col col-md-3">
                                <label class="form-label">وضعیت</label>
                                <select class="form-select" name="status">
                                    <option value="0" @if (old('status') == '0') selected @endif> غیرفعال</option>
                                    <option value="1" @if (old('status') == '1') selected @endif> فعال</option>
                                </select>
                                @error('status')
                                    <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="mb-3 col col-md-3">
                                <label class="form-label">  وضعیت فروش </label>
                                <select class="form-select" name="marketable">
                                    <option value="0" @if (old('marketable') == '0') selected @endif> غیرفعال</option>
                                    <option value="1" @if (old('marketable') == '1') selected @endif> فعال</option>
                                </select>
                                @error('marketable')
                                    <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                            <div class="mb-3 col col-md-3">
                                <label class="form-label">انتخاب دسته بندی</label>
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"  @if(old('category_id')==$category->id) selected @endif >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                            <div class="mb-3 col col-md-5">
                                <label class="form-label">تصویر محصول</label>
                                <div class="product-file-upload" onclick="document.getElementById('productFileInput').click()">
                                    <div class="product-file-icon">🖼️</div>
                                    <div class="product-file-text">
                                        <div class="product-file-title">عکس محصول را انتخاب کنید</div>
                                        <div class="product-file-hint">پسوندهای مجاز :png,jpg,jpeg,gif,webp</div>
                                    </div>
                                    <input type="file" id="productFileInput"  name="image" />
                                </div>
                                <div id="productFileName" class="product-file-name"></div>
                                @error('image')
                                    <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                            <div class="mb-3 col-12">
                                <label class="form-label">توضیحات</label>
                                <textarea class="form-control" rows="3"  name="description" id="description">{{old('description')}} </textarea>
                                @error('description')
                                    <span class="p-1 py-3 my-3 text-danger rounded"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.market.product.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">&#x1F4BE; ذخیره</button>
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
