@extends('admin.layouts.master')
@section('title','ویرایش ادمین  ')


@section('content')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">&#129489;&#8205;&#9878; ویرایش ادمین </h5>
            </div>
            <form action="{{route('admin.user.client.update',$client)}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                        <div class="row">


                           <div class="mb-3 col col-md-4" disabled>
                                <label class="form-label text-center block"> ایمیل  </label>
                                <span>{{ $client->email }}</span>
                            </div>


                           <div class="mb-3 col col-md-6" disabled>
                                <label class="form-label"> موبایل  </label>
                                <span>{{ $client->mobile }}</span>
                            </div>

                            <div class="mb-3 col col-md-6">
                                <label class="form-label">نام کاربری </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$client->name) }}">
                                @error('name')
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


