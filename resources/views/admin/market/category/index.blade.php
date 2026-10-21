@extends('admin.layouts.master')
@section('title', 'لیست دسته بندی ها')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3>🏷️ مدیریت دسته‌بندی‌ها</h3>
                <a   href="{{route('admin.market.category.create')}}"  class="btn-gold">➕ افزودن دسته</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در دسته‌بندی‌ها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

        <!-- دکمه‌های فیلتر وضعیت دسته بندی ها -->
        <div class="status-filter-buttons">
          <a href="{{route('admin.market.category.index')}}" class="status-btn" onclick="filterByStatus(this, '')" style="text-decoration: none;>
            <span class="btn-icon">📋</span>
            <span>همه تگ‌ها</span>
            <span class="btn-count">  {{App\Models\Admin\market\Category::allCategory()->count() }}  </span>
          </a>

          <a href="{{route('admin.market.category.active-category')}}" class="status-btn"   data-filter="success" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✓</span>
            <span>فعال</span>
            <span class="btn-count">{{App\Models\Admin\market\Category::activeCategory()->count()}}</span>
          </a>


          <a href="{{route('admin.market.category.inactive-category')}}" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✗</span>
            <span>غیرفعال</span>
            <span class="btn-count"> {{App\Models\Admin\Market\Category::inactiveCategory()->count() }} </span>
          </a>
        </div>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته بندی</th>
                            <th>دسته والد</th>
                            <th> اسلاگ</th>
                            <th>وضعیت</th>

                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key=>$category)
                          <tr>
                            <th>{{$categories->firstItem()+$key}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->parent->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                                @if ($category->status == "0")
                                    <span class="badge-gold bg-danger-g">غیرفعال</span>
                                @else
                                    <span class="badge-gold bg-success-g">فعال</span>
                                @endif

                            </td>

                            <td class="actions">
                                <a href="{{route('admin.market.category.edit',$category)}}" class="btn-gold btn-gold-sm">&#x270F;</a>
                                    <form action="{{ route('admin.market.category.destroy', $category) }}" method="post" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-gold btn-gold-sm btn-gold-danger delete-btn"
                                        style="font-size: 20px">&#x1F5D1;</button>
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
                      {{$categories->links()}}
                </div>
            </div>

        </div>

    </section>


@endsection
