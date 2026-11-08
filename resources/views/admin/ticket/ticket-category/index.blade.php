@extends('admin.layouts.master')
@section('title', 'لیست دسته بندی تیکت ها')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3> <span   style="font-size:28px;">&#128451;</span>  دسته‌بندی‌ها</h3>
                <a   href="{{route('admin.tickets.ticket-category.create')}}"  class="btn-gold">➕ افزودن دسته تیکت</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در دسته بندی تیکت ها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

        <!-- دکمه‌های فیلتر وضعیت دسته بندی تیکت ها -->
        <div class="status-filter-buttons">
          <a href="{{route('admin.tickets.ticket-category.index')}}" class="status-btn" onclick="filterByStatus(this, '')" style="text-decoration: none;"">
            <span class="btn-icon" style="font-size:22px;"> &#128451; </span>
            <span>همه دسته بندی ها</span>
            <span class="btn-count">  {{App\Models\Admin\Ticket\TicketCategory::allCategory()->count() }}  </span>
          </a>

          <a href="{{route('admin.tickets.ticket-category.active')}}" class="status-btn"   data-filter="success" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✓</span>
            <span>فعال</span>
            <span class="btn-count">{{App\Models\Admin\Ticket\TicketCategory::activeCategory()->count()}}</span>
          </a>


          <a href="{{route('admin.tickets.ticket-category.inactive')}}" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✗</span>
            <span>غیرفعال</span>
            <span class="btn-count"> {{App\Models\Admin\Ticket\TicketCategory::inactiveCategory()->count() }} </span>
          </a>
        </div>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته بندی تیکت</th>
                             <th>وضعیت</th>
                              <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key=>$category)
                          <tr>
                            <th>{{$categories->firstItem()+$key}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                @if ($category->status == "0")
                                    <span class="badge-gold bg-danger-g">غیرفعال</span>
                                @else
                                    <span class="badge-gold bg-success-g">فعال</span>
                                @endif

                            </td>

                             <td>{{$category->create}}</td>

                            <td class="actions">
                                <a href="{{route('admin.tickets.ticket-category.edit',$category)}}" class="btn-gold btn-gold-sm">&#x270F;</a>
                                    <form action="{{ route('admin.tickets.ticket-category.destroy', $category) }}" method="post" class="delete-form">
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
