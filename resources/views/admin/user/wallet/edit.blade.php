@extends('admin.layouts.master')

@section('title','ویرایش کیف پول')

@section('content')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class=""> ویرایش کیف پول</h5>
            </div>
            <form action="{{route('admin.user.wallet.update',$wallet)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                                <label class="form-label">{{old('balance',$wallet->user->email ?? $wallet->user->mobile )}} </label>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col col-md-3" >
                                <label class="form-label">مبلغ </label>
                                <input type="number" class="form-control" name="balance" value="{{old('balance',$wallet->balance)}}">
                         </div>

                    </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.user.wallet.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">💾 بروزرسانی</button>
                </div>
            </form>
        </div>


@endsection
