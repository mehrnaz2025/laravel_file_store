@extends('admin.layouts.master')

@section('title','ایجاد کیف پول')

@section('content')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">&#x1F4B0; افزودن کیف پول</h5>
            </div>
            <form action="{{route('admin.user.wallet.store')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="mb-3 col col-md-3">
                                <label class="form-label">مبلغ </label>
                                <input type="number" class="form-control" name="balance" value="{{old('balance')}}">
                               @error('balance')
                                 <div class="p-1 my-1 text-danger rounded "><strong>{{$message}}</strong></div>
                               @enderror
                        </div>


                        <div class="mb-3 col col-md-4">
                            <label class="form-label">انتخاب  کاربر </label>
                            <select class="form-select" name="user_id">
                                @forelse ( $users as  $user)
                                    <option value="{{ $user->id}}" @if(old('user_id') == $user->id)  selected  @endif >{{  $user->email ??  $user->mobile   }}</option>
                                @empty

                                @endforelse
                            </select>
                               @error('user_id')
                                 <div class="p-1 my-2 text-danger rounded "><strong>{{$message}}</strong></div>
                               @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.user.wallet.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">💾 ذخیره</button>
                </div>
            </form>
        </div>


@endsection
