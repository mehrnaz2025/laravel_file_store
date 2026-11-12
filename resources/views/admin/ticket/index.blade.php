@extends('admin.layouts.master')
@section('title', 'لیست تیکت ها')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3> <span style="font-size:28px;">&#128451;</span> تیکت ها</h3>
                {{-- <a   href=""  class="btn-gold">➕ افزودن دسته تیکت</a> --}}
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در تیکت ها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

            <!-- ردیف اول: فیلتر اولویت -->
            <div class="status-filter-buttons">
                <button type="button" class="status-btn active" data-filter="all" data-group="priority"
                    onclick="filterTickets(this)">
                    <span class="btn-icon" style="font-size:22px;">📋</span>
                    <span>همه اولویت‌ها</span>
                    <span class="btn-count"> ------ </span>
                </button>
                <button type="button" class="status-btn" data-filter="high" data-group="priority"
                    onclick="filterTickets(this)">
                    <span class="btn-icon" style="font-size:22px;">🔴</span>
                    <span>بالا</span>
                    <span class="btn-count">---------</span>
                </button>
                <button type="button" class="status-btn" data-filter="medium" data-group="priority"
                    onclick="filterTickets(this)">
                    <span class="btn-icon" style="font-size:22px;">🟡</span>
                    <span>متوسط</span>
                    <span class="btn-count">-------</span>
                </button>
                <button type="button" class="status-btn" data-filter="low" data-group="priority"
                    onclick="filterTickets(this)">
                    <span class="btn-icon" style="font-size:22px;">🔵</span>
                    <span>کم</span>
                    <span class="btn-count">--------</span>
                </button>
            </div>

            <!-- ردیف دوم: فیلتر وضعیت -->
            <div class="status-filter-buttons">
                <button type="button" class="status-btn active" data-filter="all" data-group="status"
                    onclick="filterTickets(this)">
                    <span class="btn-icon">📋</span>
                    <span>همه وضعیت‌ها</span>
                    <span class="btn-count">3</span>
                </button>
                <button type="button" class="status-btn" data-filter="open" data-group="status"
                    onclick="filterTickets(this)">
                    <span class="btn-icon">⏳</span>
                    <span>باز</span>
                    <span class="btn-count">2</span>
                </button>
                <button type="button" class="status-btn" data-filter="answered" data-group="status"
                    onclick="filterTickets(this)">
                    <span class="btn-icon">💬</span>
                    <span>پاسخ داده شده</span>
                    <span class="btn-count">1</span>
                </button>
                <button type="button" class="status-btn" data-filter="closed" data-group="status"
                    onclick="filterTickets(this)">
                    <span class="btn-icon">✓</span>
                    <span>بسته</span>
                    <span class="btn-count">0</span>
                </button>
            </div>


            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>نویسنده تیکت</th>
                            <th>دسته</th>
                            <th>اولویت</th>
                            <th>پاسخ دهنده</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $key=>$ticket)
                            <tr>
                                <th>{{ $tickets->firstItem() + $key }}</th>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ $ticket->user->name ?? 'کاربر ناشناس' }}</td>
                                <td>{{ $ticket->category->name }}</td>
                                <td>{{ $ticket->priority->name }}</td>
                                <td>{{ $ticket->admin->user->name ?? 'ادمین تیکت' }}</td>
                                <td>
                                    @if ($ticket->status == 0)
                                        <span class="badge-gold bg-warning-g">باز</span>
                                    @else
                                        <span class="badge-gold bg-info-g">پاسخ</span>
                                    @endif
                                </td>

                                <td>{{ $ticket->create }}</td>

                                <td class="actions">
                                    <a href="{{ route('admin.ticket.ticket.show', $ticket) }}"
                                        class="btn-gold btn-gold-sm btn-gold-info badge badge-info rounded rounded-circle py-3" title="پاسخ ها"
                                        style="font-size:11px;color:white;">💬 پاسخ‌ها </a>

                                    @if ($ticket->status == 1)
                                        <a class="btn-gold-warning btn-gold badge badge-danger rounded rounded-circle p-2"
                                            href="{{ route('admin.ticket.change-status', $ticket->id) }}"> باز کردن </a>
                                    @else
                                        <a class="btn-gold-success btn-gold badge badge-info rounded rounded-circle p-2"
                                            href="{{ route('admin.ticket.change-status', $ticket->id) }}"> بستن
                                        </a>
                                    @endif

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="text-center w-100">
                                        <h5 class="text-center" style="font-size:14px;"> تیکتی یافت نشد </h5>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{ $tickets->links() }}
                </div>
            </div>

        </div>

    </section>


@endsection
