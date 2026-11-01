@extends('admin.layouts.master')
@section('title', 'لیست نقش ها')
@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3>🏷️ مدیریت سطوح دسترسی</h3>
                <a href="{{ route('admin.user.role.create') }}" class="btn-gold">➕ افزودن نقش</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در نقش ها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>


            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>نام نقش</th>
                            <th>توضیحات</th>
                            <th>مجوزها</th>
                            <th>کاربران</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $key=>$role)
                            <tr>
                                <th>{{ $roles->firstItem() + $key }}</th>
                                <td><strong style="color:var(--gold-light)"> {{ $role->name }}  </strong></td>
                                <td>{{ $role->description }}</td>
                                <td><span class="badge-gold bg-info-g">  {{$role->permissions->count()}}  مجوز</span></td>
                                <td> {{ $role->users->count()  }} </td>
                                <td class="actions">
                                    <a href="{{ route('admin.user.role.edit', $role) }}"   class="btn-gold btn-gold-sm">&#x270F;</a>
                                    <form action="{{ route('admin.user.role.destroy', $role) }}" method="post"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-gold btn-gold-sm btn-gold-danger delete-btn"
                                            style="font-size: 18px">&#x1F5D1;</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{ $roles->links() }}
                </div>
            </div>




        </div>


    </section>




@endsection
