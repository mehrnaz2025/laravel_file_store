@extends('admin.layouts.master')
@section('title', 'لیست محصولات')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3>🏷️ مدیریت محصولات</h3>
                <a   href="{{route('admin.market.product.create')}}"  class="btn-gold">➕ افزودن محصول</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در محصولات..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

        <!-- دکمه‌های فیلتر وضعیت محصولات -->
        <div class="status-filter-buttons">
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
        </div>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>تصویر</th>
                            <th>نام محصول</th>
                            <th>نامک(اسلاگ)</th>
                            <th> نام دسته</th>
                            <th>قیمت (ت)</th>
                            <th>تعداد بازدید</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key=>$product)
                          <tr>
                                <th>{{ $products->firstItem() + $key }}</th>
                                <td> <img src="{{asset( $product->image) }}" style="width: 50px;height:30px"/></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->category->name ?? '---' }}</td>
                                <td>{{number_format( $product->price) }}</td>
                                <td><span class="badge-gold bg-success-g"> {{ $product->view }} </span></td>
                                <td> {{ $product->user->name ?? '--' }} </td>
                                <td>
                                    @if ($product->status == '0')
                                        <span class="badge-gold bg-danger-g">غیرفعال</span>
                                    @else
                                        <span class="badge-gold bg-success-g">فعال</span>
                                    @endif

                                </td>

                            <td class="actions">
                                    <a href="{{ route('admin.market.product.edit', $product) }}" class="btn-gold btn-gold-sm">&#x270F;</a>

                                    <form action="{{ route('admin.market.product.destroy', $product) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-gold btn-gold-sm btn-gold-danger" type="submit">&#x1F5D1;</button>
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
                      {{$products->links()}}
                </div>
            </div>

        </div>

    </section>


@endsection
