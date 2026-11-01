@extends('admin.layouts.master')

@section('title', '  ویرایش نقش ')

@section('content')

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="">&#127917;ویرایش نقش  </h5>
        </div>
        <form action="{{ route('admin.user.role.update',$role) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3 col col-md-6">
                        <label class="form-label"> نام نقش(انگلیسی)</label>
                        <input type="text" class="form-control"  value="{{ old('name', $role->name) }}" disabled>
                        @error('name')
                            <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3 col col-md-6">
                        <label class="form-label"> توضیحات </label>
                        <input type="text" class="form-control" name="description" value="{{ old('description', $role->description) }}">
                        @error('description')
                            <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">مجوزها</label>
                        <div class="permissions-grid">
                            @forelse ($permissions as $key=>$permission )
                                <label class="perm-item">
                                    <input type="checkbox"  name="permissions[]"  value="{{$permission->name}}"     @if(in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif />
                                    {{$permission->name}}
                                 </label>
                            @empty

                            @endforelse
                            @error('permissions.'.$key)
                            <span class="bg-danger text-white p-1 rounded">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.user.role.index') }}" class="btn-gold btn-gold-danger mx-2">برگشت</a>
                <button type="submit" class="btn-gold btn-gold-success">💾 بروزرسانی</button>
            </div>
        </form>
    </div>


@endsection
