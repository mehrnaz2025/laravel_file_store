@extends('admin.layouts.master')
@section('title', 'افزودن فایل')


@section('content')
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="">&#128214; /&#127911; افزودن فایل</h5>
        </div>
        <form action="{{ route('admin.market.product-file.store',$product) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                    <div class="row">

                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label"> عنوان</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-lg-3">
                            <label class="form-label"> شماره </label>
                            <input type="number" class="form-control" name="number" value="{{ old('number') }}">
                            @error('number')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-lg-3">
                            <label class="form-label"> پیش نمایش   </label>
                            <select class="form-select" name="is_free_preview">
                                <option value="0" @if (old('is_free_preview') == '0') selected @endif> خیر</option>
                                <option value="1" @if (old('is_free_preview') == '1') selected @endif> بله</option>
                            </select>
                            @error('is_free_preview')
                                <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-4"></div>

                        <!-- ===== آپلود فایل محصول ===== -->
                        <div class="mb-3 col col-12 col-lg-6">
                            <label class="form-label">فایل محصول</label>
                            <div class="product-file-upload" onclick="document.getElementById('productFileInput').click()">
                                <div class="product-file-icon">🖼️</div>
                                <div class="product-file-text">
                                    <div class="product-file-title">فایل محصول را انتخاب کنید</div>
                                    <div class="product-file-hint">پسوندهای مجاز :pdf, zip, rar, mp3, 7z, tar, wav, txt </div>
                                </div>
                                <input type="file" id="productFileInput"  name="file"
                                    >
                            </div>
                            <div id="productFileName" class="product-file-name"></div>
                            @error('file')
                                <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>


                    </div>
            </div>
            <div class="modal-footer">
                    <a href="{{ route('admin.market.product-file.index',$product) }}" class="btn-gold btn-gold-danger mx-2">برگشت</a>
                <button type="submit" class="btn-gold btn-gold-success">&#x1F4BE; ذخیره</button>
            </div>
        </form>
    </div>

@endsection


