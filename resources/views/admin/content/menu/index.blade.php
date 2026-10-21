@extends('admin.layouts.master')
@section('title', 'لیست منوها')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3>💳 لیست منوها </h3>
                <a href="{{ route('admin.content.menu.create') }}" class="btn-gold">➕ ایجاد منو</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در منوها..."
                    onkeyup="searchTable('payments-table', this.value)">
            </div>

            <div class="status-filter-buttons">
                <a href="{{ route('admin.content.menu.index') }}" class="status-btn" data-filter="all" onclick="filterByStatus(this, '')" style="text-decoration: none;">
                    <span class="btn-icon">📋</span>
                    <span>همه منوها</span>
                    <span class="btn-count">   {{  App\Models\Admin\Content\Menu::allMenu()->count()  }}  </span>
                </a>
                <a href="{{ route('admin.content.menu.active-menu') }}" class="status-btn" data-filter="success" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
                    <span class="btn-icon">✓</span>
                    <span>فعال</span>
                    <span class="btn-count"> {{  App\Models\Admin\Content\Menu::activeMenu()->count()  }} </span>
                </a>
                <a href="{{ route('admin.content.menu.inactive-menu') }}" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
                    <span class="btn-icon">✗</span>
                    <span>غیرفعال</span>
                    <span class="btn-count"> {{  App\Models\Admin\Content\Menu::inactiveMenu()->count()  }} </span>
                </a>

            </div>

            <div style="overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th># </th>
                            <th>عنوان </th>
                            <th> والد </th>
                            <th> آدرس </th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($menus as  $key=>$menu)
                            <tr data-status="success" style="">
                                <td>{{$menus->firstItem() + $key}}</td>
                                <td> {{ $menu->name }} </td>
                                <td> {{ $menu->parent->name }} </td>
                                <td> {{ $menu->url }} </td>

                                <td>
                                    @if ( $menu->status == 1)
                                            <span class="badge-gold bg-success-g">موفق</span>
                                        @else
                                        <span class="badge-gold bg-danger-g">ناموفق</span>
                                    @endif
                                </td>
                                <td>{{ $menu->create }}</td>
                                <td class="actions">
                                    <a href="{{route('admin.content.menu.edit',$menu)}}" class="btn-gold btn-gold-sm" style="font-size: 16px;">&#x270F;</a>
                                    <form action="{{ route('admin.content.menu.destroy',$menu) }}" method="post" class="delete-form">
                                            @csrf
                                            @method('DELETE')

                                           <button  type="submit" class="btn-gold btn-gold-sm btn-gold-danger  delete-btn" style="font-size: 20px">&#x1F5D1;</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                               <tr>
                                   <td colspan="7"> <div class="alert alert-secodary text-center text-white font-bold" style="font-size: 15px"> هیچ داده ای وجود ندارد </div></td>
                               </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
                   <div class="row">
            <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{$menus->links()}}
            </div>
        </div>
        </div>
    </section>

@endsection
