@extends('admin.layouts.master')

@section('title', 'تاریخچه تراکنش‌ها')

@section('content')


    <div class="glass">
        <div class="section-header">
            <h3> تاریخچه تراکنش‌ها</h3>
            <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#modalTransaction">➕ ثبت تراکنش</button>
        </div>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="جستجو در تراکنش‌ها..."
                onkeyup="searchTable('transactions-table', this.value)">
        </div>

        <!-- دکمه‌های فیلتر تراکنش‌ها -->
        <div class="status-filter-buttons">
            <a type="button" class="status-btn" onclick="filterByStatus(this, '')"  style="text-decoration: none;>
                <span class="btn-icon">📋</span>
                <span>همه تراکنش‌ها</span>
                <span class="btn-count">4</span>
            </a>
            <a type="button" class="status-btn" onclick="filterByStatus(this, '')"  style="text-decoration: none;>
                <span class="btn-icon">🟢</span>
                <span>شارژ</span>
                <span class="btn-count">2</span>
            </a>
            <a type="button" class="status-btn" onclick="filterByStatus(this, '')"  style="text-decoration: none;>
                <span class="btn-icon">🔴</span>
                <span>برداشت</span>
                <span class="btn-count">2</span>
            </a>
        </div>

        <div style="overflow-x:auto">
            <table id="transactions-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>کاربر</th>
                        <th>نوع</th>
                        <th>مبلغ (ریال)</th>
                        <th>توضیحات</th>
                        <th>تاریخ</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($transactions as $key=>$transaction)
                        <tr>
                            <th>{{ $transactions->firstItem() + $key }}</th>
                            <td>{{ $transaction->wallet->user->email ?? $transaction->wallet->user->mobile }}</td>
                            <td class="d-flex align-items-center" {{ $transaction->isCredit }}>
                                {{ $transaction->typeTransaction }}</td>
                            <td {{ $transaction->isCredit }}>{{ $transaction->amountTransaction }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>{{ $transaction->create }}</td>
                            {{-- <td class="actions">
                                    <a href="{{ route('admin.user.transaction.edit', $transaction) }}"   class="btn-gold btn-gold-sm">&#x270F;</a>
                                   <form action="{{ route('admin.user.transaction.destroy', $transaction) }}" method="post"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-gold btn-gold-sm btn-gold-danger delete-btn"
                                            style="font-size: 18px">&#x1F5D1;</button>
                                    </form>
                                </td> --}}
                        </tr>

                    @empty
                    @endforelse




                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="d-flex col-12 justify-content-center w-100 mt-3">
                {{ $transactions->links() }}
            </div>
        </div>

    </div>



@endsection
