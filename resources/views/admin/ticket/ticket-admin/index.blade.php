@extends('admin.layouts.master')
@section('title', 'لیست ادمین تیکت ها')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3> <span style="font-size:28px;">&#128451;</span> ادمین تیکت ها</h3>
                {{-- <a href="{{ route('admin.ticket.ticket-priority.create') }}" class="btn-gold">➕ افزودن اولویت تیکت</a> --}}
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در ادمین  تیکت ها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

            <!-- دکمه‌های فیلتر وضعیت دسته بندی تیکت ها -->
            {{-- <div class="status-filter-buttons">
                <a href="{{ route('admin.ticket.ticket-priority.index') }}" class="status-btn"
                    onclick="filterByStatus(this, '')" style="text-decoration: none;"">
                    <span class="btn-icon" style="font-size:22px;"> &#128451; </span>
                    <span>همه اولویت تیکت ها</span>
                    <span class="btn-count"> {{ App\Models\Admin\Ticket\TicketPriority::allTicketPriority()->count() }}
                    </span>
                </a>

                <a href="{{ route('admin.ticket.ticket-priority.active') }}" class="status-btn" data-filter="success"
                    onclick="filterByStatus(this, '')" style="text-decoration: none;">
                    <span class="btn-icon">✓</span>
                    <span>فعال</span>
                    <span
                        class="btn-count">{{ App\Models\Admin\Ticket\TicketPriority::activeTicketPriority()->count() }}</span>
                </a>


                <a href="{{ route('admin.ticket.ticket-priority.inactive') }}" class="status-btn" data-filter="failed"
                    onclick="filterByStatus(this, '')" style="text-decoration: none;">
                    <span class="btn-icon">✗</span>
                    <span>غیرفعال</span>
                    <span class="btn-count"> {{ App\Models\Admin\Ticket\TicketPriority::inactiveTicketPriority()->count() }}
                    </span>
                </a>
            </div> --}}

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام ادمین</th>
                            <th>ایمیل </th>
                            <th>موبایل </th>>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $key=>$admin)
                            <tr>
                                <th>{{ $admins->firstItem() + $key }}</th>
                                <td>{{$admin->name ?? ' بدون نام'}} </td>
                                <td>{{$admin->email ?? '-'}} </td>
                                <td>{{$admin->mobile ?? '-'}} </td>

                                <td>{{ $admin->create }}</td>

                                <td class="actions">

                                    <a class="btn-gold btn-gold-sm {{$admin->ticketAdmin  ?'btn-gold-danger'  :'btn-gold-success'}}"
                                            href="{{route('admin.ticket.ticket-admin.change-type-user',$admin)}}">

                                            {{$admin->ticketAdmin  ? 'حذف ادمین تیکت' :  'ثبت به عنوان ادمین تیکت' }}
                                    </a>
                                </td>

                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{ $admins->links() }}
                </div>
            </div>

        </div>

    </section>


@endsection

