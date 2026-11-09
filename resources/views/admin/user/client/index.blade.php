@extends('admin.layouts.master')
@section('title', 'لیست کاربران ')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3>ادمین ها </h3>
                <a   href="{{route('admin.user.admin-user.create')}}"  class="btn-gold">➕ افزودن کاربر</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در  کاربران..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

        <!-- دکمه‌های فیلتر وضعیت محصولات -->
        {{-- <div class="status-filter-buttons">
          <a href="{{ route('admin.market.product.index') }}" class="status-btn" onclick="filterByStatus(this, '')" style="text-decoration: none;>
            <span class="btn-icon">&#128214; /&#127911;</span>
            <span>همه محصولات </span>
            <span class="btn-count"> {{ App\Models\Admin\market\Product::allProducts()->count() }}   </span>
          </a>

          <a href="{{ route('admin.market.product.active-product') }}" class="status-btn"   data-filter="success" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✓</span>
            <span>فعال</span>
            <span class="btn-count"> {{ App\Models\Admin\market\Product::activeProducts()->count() }}</span>
          </a>


          <a href="{{ route('admin.market.product.inactive-product') }}" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✗</span>
            <span>غیرفعال</span>
            <span class="btn-count">  {{ App\Models\Admin\Market\Product::inactiveProducts()->count() }}  </span>
          </a>
        </div> --}}

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ایمیل</th>
                            <th>شماره موبایل</th>
                            <th>نام کاربری</th>
                            <th>فعال سازی</th>
                            <th> عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clients as $key => $client)
                          <tr>
                                   <th>{{ $clients->firstItem() + $key }}</th>
                                   <td>{{ $client->email }}</td>
                                    <td>{{ $client->mobile }}</td>
                                    <td>{{ $client->name }}</td>
                                <td>
                                    @if ($client->activation == '0')
                                        <span class="badge-gold bg-danger-g">غیرفعال</span>
                                    @else
                                        <span class="badge-gold bg-success-g">فعال</span>
                                    @endif

                                </td>

                            <td class="actions">
                                    <a href="{{ route('admin.user.client.edit', $client) }}" class="btn-gold btn-gold-sm" style="font-size: 18px;">&#x270F;</a>
                                    <form action="{{ route('admin.user.client.destroy', $client) }}" method="post"  class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-gold btn-gold-sm btn-gold-danger delete-btn" type="submit" style="font-size: 18px;">&#x1F5D1;</button>
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
                      {{$clients->links()}}
                </div>
            </div>

        </div>

    </section>


@endsection
