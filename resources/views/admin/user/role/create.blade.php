@extends('admin.layouts.master')

@section('title','ایجاد نقش  ')

@section('content')


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">&#127917; ایجاد  نقش</h5>
            </div>
            <form action="{{ route('admin.user.role.store') }}" method="post">
               @csrf
              <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col col-md-6">
                            <label class="form-label"> نام نقش(انگلیسی)</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-3 col col-md-6">
                            <label class="form-label"> توضیحات </label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                            @error('description')
                                <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">مجوزها</label>
                            <div class="permissions-grid">
                                @forelse ($permissions as $key=>$permission )
                                    <label class="perm-item"><input type="checkbox"  name="permissions[]"  value="{{$permission->name}}"> {{$permission->name}} </label>
                                    @error('permissions.'.$key)
                                        <span class="bg-danger text-white p-1 rounded">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    @empty

                                @endforelse

                            </div>
                        </div>

                    </div>
              </div>
            <div class="modal-footer">
                <a href="{{ route('admin.user.role.index') }}" class="btn-gold btn-gold-danger mx-2">برگشت</a>
                <button type="submit" class="btn-gold btn-gold-success">💾 ذخیره</button>
            </div>
        </form>
        </div>


@endsection
