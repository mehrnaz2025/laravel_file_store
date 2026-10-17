@extends('admin.layouts.master')
@section('title','ایجاد  تگ ')

@section('content')

        <div class="">
            <div class="modal-header">
                <h5 class="">🏷️ افزودن منو</h5>
            </div>
            <form action="{{  route('admin.content.tag.store')  }}" method="post">
                @csrf
                <div class="modal-body">

                       <div class="row">
                             <div class="mb-3 col col-md-4">
                                <label class="form-label">نام تگ</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @error('name')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                                @enderror
                        </div>

                        <div class="mb-3 col col-md-3">
                            <label class="form-label">وضعیت</label>
                            <select class="form-select" name="status">
                                <option value="0"  @if(old('status') == "0") selected @endif>غیرفعال</option>
                                <option value="1"  @if(old('status') == "1") selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>



                        <div class="mb-3  col col-md-5">
                            <label class="form-label">رنگ تگ</label>
                            <div class="row">
                                <div class="color-picker-group d-flex ">
                                    <input type="color" id="tagColorPicker"  class="mt-2"  value="{{ old('color') }}"  name="color">
                                    <div style="margin-top:10px;display:flex;gap:4px;flex-wrap:wrap">
                                        <span class="tag-color-preview" style="background:#e74c3c;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#e74c3c';document.getElementById('tagColorText').value='#e74c3c'">🔥</span>
                                        <span class="tag-color-preview" style="background:#2ecc71;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#2ecc71';document.getElementById('tagColorText').value='#2ecc71'">🆕</span>
                                        <span class="tag-color-preview" style="background:#3498db;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#3498db';document.getElementById('tagColorText').value='#3498db'">💎</span>
                                        <span class="tag-color-preview" style="background:#f39c12;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#f39c12';document.getElementById('tagColorText').value='#f39c12'">⚡</span>
                                        <span class="tag-color-preview" style="background:#9b59b6;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#9b59b6';document.getElementById('tagColorText').value='#9b59b6'">🎓</span>
                                        <span class="tag-color-preview" style="background:#1abc9c;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#1abc9c';document.getElementById('tagColorText').value='#1abc9c'">🎯</span>
                                        <span class="tag-color-preview" style="background:#e67e22;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#e67e22';document.getElementById('tagColorText').value='#e67e22'">⭐</span>
                                        <span class="tag-color-preview" style="background:#95a5a6;cursor:pointer" onclick="document.getElementById('tagColorPicker').value='#95a5a6';document.getElementById('tagColorText').value='#95a5a6'">📦</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.content.tag.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">
                        <span class="">&#x1F4BE;</span>
                         ذخیره
                     </button>
                </div>
            </form>
        </div>


@endsection
