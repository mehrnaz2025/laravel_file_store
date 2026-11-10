@extends('admin.layouts.master')
@section('title', 'لیست سفارشات')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3>&#x1F9FE; لیست سفارشات</h3>
                {{-- <a   href="{{route('admin.market.category.create')}}"  class="btn-gold">➕ افزودن دسته</a> --}}
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در سفارشات..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

            <!-- دکمه‌های فیلتر وضعیت -->
            <div class="status-filter-buttons">
                <a href="{{ route('admin.market.category.index') }}" class="status-btn" onclick="filterByStatus(this, '')"
                    style="text-decoration: none;>
            <span class="btn-icon">&#x1F9FE;</span>
                    <span>همه سفارشات</span>
                    <span class="btn-count"> --- </span>
                </a>

                <a href="" class="status-btn" data-filter="success" onclick="filterByStatus(this, '')"
                    style="text-decoration: none;">
                    <span class="btn-icon">✓</span>
                    <span>فعال</span>---</span>
                </a>


                <a href="{{ route('admin.market.category.inactive-category') }}" class="status-btn" data-filter="failed"
                    onclick="filterByStatus(this, '')" style="text-decoration: none;">
                    <span class="btn-icon">✗</span>
                    <span>غیرفعال</span>
                    <span class="btn-count"> ---- </span>
                </a>
            </div>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کاربر</th>
                            <th>مبلغ کل</th>
                            <th>تخفیف</th>
                            <th>مبلغ نهایی</th>
                            <th>وضعیت</th>
                            <td>کد پیگیری</td>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $key=>$order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->user->name ?? 'کاربر' }}</td>
                                <td>{{ $order->user->email ?? '-' }}</td>
                                <td>{{ number_format($order->total_amount) }} تومان</td>
                                <td>{{ number_format($order->discount_amount) }} تومان</td>
                                <td">{{ number_format($order->final_amount) }} تومان</td>
                                <td>{{ $order->tracking_code }}</td>
                                <td>{{ $order->create }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-white">
                                    <div>هیچ سفارشی یافت نشد</div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{ $orders->links() }}
                </div>
            </div>

        </div>

    </section>


@endsection
