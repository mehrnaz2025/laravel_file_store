
@extends('admin.layouts.master')
@section('title', 'ویرایش منو')

@section('content')

        <div class="">
            <div class="modal-header">
                <h5 class="">🏷️ ویرایش منو</h5>
            </div>
            <form action="{{  route('admin.content.menu.update',$menu)  }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="row">
                        <div class="mb-3 col col-md-4">
                            <label class="form-label">نام منو</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$menu->name)}}">
                            @error('name')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                       </div>

                       <div class="mb-3 col col-md-8">
                            <label class="form-label">  آدرس </label>
                            <input type="text" class="form-control" name="url" value="{{old('url',$menu->url)}}" placeholder="https://example.com">
                            @error('url')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>


                        <div class="mb-3 col col-md-4">
                            <label class="form-label">انتخاب  منو</label>
                            <select class="form-select" name="parent_id">
                                <option value=""> منوی والد</option>
                                @foreach ($parentMenus as  $parentmenu)
                                     <option value="{{$parentmenu->id}}"   @if (old('parent_id',$menu->id) == $parentmenu->id) selected @endif> {{$parentmenu->name}}  </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-3 col col-md-4">
                            <label class="form-label">وضعیت</label>
                            <select class="form-select" name="status">
                                <option value="0"  @if(old('status',$menu->status)== 0)  selected @endif>  غیرفعال</option>
                                <option value="1"  @if(old('status',$menu->status) == 1)  selected @endif > فعال</option>
                           </select>
                          @error('status')
                                 <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>

                       <div class="mb-3 col col-md-4">
                            <label class="form-label">موقعیت</label>
                            <select class="form-select" name="order">
                                <option value="0"  @if(old('order',$menu->order) == 0)  selected @endif>  هدر</option>
                                <option value="1"  @if(old('order',$menu->order) == 1)  selected @endif> فوتر</option>
                            </select>
                            @error('order')
                                 <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.content.menu.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">
                        <span class="">&#x1F4BE;</span>
                         بروزرسانی
                     </button>
                </div>
            </form>
        </div>


@endsection
