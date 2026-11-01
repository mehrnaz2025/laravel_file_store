@extends('admin.layouts.master')

@section('title', 'لیست مجوزها')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3>🏷️ مدیریت سطوح دسترسی</h3>
                <a href="{{ route('admin.user.permission.create') }}" class="btn-gold">➕ افزودن مجوز</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در مجوزها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

            <section id="page-permissions">
                <div class="glass">

                    <!-- آمار مجوزها -->
                    <div class="permissions-stats">
                        <div class="perm-stat-card">
                            <div class="perm-stat-icon">📋</div>
                            <div class="perm-stat-info">
                                <div class="perm-stat-value">18</div>
                                <div class="perm-stat-label">کل مجوزها</div>
                            </div>
                        </div>
                        {{-- <div class="perm-stat-card">
                                    <div class="perm-stat-icon">📦</div>
                                    <div class="perm-stat-info">
                                        <div class="perm-stat-value">4</div>
                                        <div class="perm-stat-label">محصولات</div>
                                    </div>
                                </div> --}}
                        <div class="perm-stat-card">
                            <div class="perm-stat-icon">👥</div>
                            <div class="perm-stat-info">
                                <div class="perm-stat-value">3</div>
                                <div class="perm-stat-label">کاربران</div>
                            </div>
                        </div>
                        <div class="perm-stat-card">
                            <div class="perm-stat-icon">💰</div>
                            <div class="perm-stat-info">
                                <div class="perm-stat-value">2</div>
                                <div class="perm-stat-label">کیف پول</div>
                            </div>
                        </div>
                        <div class="perm-stat-card">
                            <div class="perm-stat-icon">⚙️</div>
                            <div class="perm-stat-info">
                                <div class="perm-stat-value">7</div>
                                <div class="perm-stat-label">سایر</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام مجوز</th>
                            <th>توضیحات</th>
                            <th>نقش‌های دارای این مجوز</th>
                            <th>تاریخ ایجاد</th>

                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $key=>$permission)
                            <tr>
                                <th>{{ $permissions->firstItem() + $key }}</th>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td><span class="role-count"> {{ $permission->roles()->count() }} نقش </span> </td>

                                <td>{{ $permission->create}}</td>
                                <td class="actions">
                                    {{-- <a href="{{ route('admin.user.permission.edit', $permission) }}"   class="btn-gold btn-gold-sm">&#x270F;</a> --}}
                                    <form action="{{ route('admin.user.permission.destroy', $permission) }}" method="post"
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
                    {{ $permissions->links() }}
                </div>
            </div>




        </div>


    </section>




@endsection
