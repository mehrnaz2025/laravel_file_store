@extends('admin.layouts.master')
@section('title', 'لیست  اولویت تیکت ها')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3> <span   style="font-size:28px;">&#128451;</span>  دسته‌بندی‌ها</h3>
                <a   href="{{route('admin.ticket.ticket-priority.create')}}"  class="btn-gold">➕ افزودن اولویت تیکت</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در اولویت  تیکت ها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

        <!-- دکمه‌های فیلتر وضعیت دسته بندی تیکت ها -->
        <div class="status-filter-buttons">
          <a href="{{route('admin.ticket.ticket-priority.index')}}" class="status-btn" onclick="filterByStatus(this, '')" style="text-decoration: none;"">
            <span class="btn-icon" style="font-size:22px;"> &#128451; </span>
            <span>همه  اولویت تیکت ها</span>
            <span class="btn-count">  {{App\Models\Admin\Ticket\TicketPriority::allTicketPriority()->count() }}  </span>
          </a>

          <a href="{{route('admin.ticket.ticket-priority.active')}}" class="status-btn"   data-filter="success" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✓</span>
            <span>فعال</span>
            <span class="btn-count">{{App\Models\Admin\Ticket\TicketPriority::activeTicketPriority()->count()}}</span>
          </a>


          <a href="{{route('admin.ticket.ticket-priority.inactive')}}" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✗</span>
            <span>غیرفعال</span>
            <span class="btn-count"> {{App\Models\Admin\Ticket\TicketPriority::inactiveTicketPriority()->count() }} </span>
          </a>
        </div>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان اولویت تیکت</th>
                             <th>وضعیت</th>
                              <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ticketPriorites as $key=>$ticketPriority)
                          <tr>
                            <th>{{$ticketPriorites->firstItem()+$key}}</th>
                            <td>{{$ticketPriority->name}}</td>
                            <td>
                                @if ($ticketPriority->status == "0")
                                    <span class="badge-gold bg-danger-g">غیرفعال</span>
                                @else
                                    <span class="badge-gold bg-success-g">فعال</span>
                                @endif

                            </td>

                             <td>{{$ticketPriority->create}}</td>

                            <td class="actions">
                                <a href="{{route('admin.ticket.ticket-priority.edit',$ticketPriority)}}" class="btn-gold btn-gold-sm">&#x270F;</a>
                                    <form action="{{ route('admin.ticket.ticket-priority.destroy', $ticketPriority) }}" method="post" class="delete-form">
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
                      {{$ticketPriorites->links()}}
                </div>
            </div>

        </div>

    </section>


@endsection
