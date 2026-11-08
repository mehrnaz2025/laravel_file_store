@extends('admin.layouts.master')
@section('title','ویرایش  دسته بندی ')


@section('content')

                <div class="modal-content">
            <div class="modal-header">
                <h5 class=""> <span style="font-size:22px;"> &#128451; </span> ویرایش دسته بندی تیکت</h5>
            </div>
            <form action="{{route('admin.tickets.ticket-category.update',$ticketCategory)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col col-md-7">
                                <label class="form-label">نام دسته</label>
                                <input type="text" class="form-control" name="name" value="{{old('name',$ticketCategory->name)}}">
                               @error('name')
                                 <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                               @enderror
                        </div>


                        <div class="mb-3 col col-md-3">
                            <label class="form-label">وضعیت</label>
                            <select class="form-select" name="status">
                                <option value="0"  @if(old('status',$ticketCategory->status) == "0") selected @endif>غیر فعال</option>
                                <option value="1"  @if(old('status',$ticketCategory->status) == "1") selected @endif>فعال</option>
                            </select>
                            @error('status')
                                 <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.tickets.ticket-category.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
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
