@extends('admin.layouts.master')
@section('title', 'لیست کدهای تخفیف')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3>🏷️  لیست کدهای تخفیف</h3>
                <a   href="{{route('admin.market.coupan.create')}}"  class="btn-gold">➕ افزودن کد تخفیف</a>
            </div>

                        <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در تخفیفات..."
                    onkeyup="searchTable('products-table', this.value)">
            </div>
            <div class="filters d-flex gap-5 align-items-center justify-content-between">
                       <div class="status-filter-buttons">
                    <a href="{{ route('admin.market.coupan.index') }}" class="status-btn active" data-filter="all"  style="text-decoration: none;"
                        onclick="filterByStatus(this, 'tags-table')">
                        <span class="btn-icon"><span  class="" style="font-size:1.2rem">&#127903;</span></span>
                        <span>همه تخفیفات</span>
                        <span class="btn-count"> {{ App\Models\Admin\market\Coupan::allCoupans()->count() }} </span>
                    </a>

                    <a href="{{ route('admin.market.coupan.active-coupan') }}" class="status-btn"    data-filter="success" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
                        <span class="btn-icon">✓</span>
                        <span>فعال</span>
                        <span class="btn-count">{{ App\Models\Admin\market\Coupan::activeCoupans()->count() }}</span>
                    </a>


                    <a href="{{ route('admin.market.coupan.inactive-coupan') }}" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
                        <span class="btn-icon">✗</span>
                        <span>غیرفعال</span>
                        <span class="btn-count"> {{ App\Models\Admin\Market\Coupan::inactiveCoupans()->count() }} </span>
                    </a>
                </div>



             </div>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                     <tr>
                            <th>#</th>
                            <th> کد تخفیف</th>
                            <th>درصد تخفیف</th>
                            <th>  تاریخ شروع </th>
                            <th>  تاریخ پایان </th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                 @forelse ($coupans as $key=>$coupan)
                            <tr>
                                <th>{{ $coupans->firstItem() + $key }}</th>
                                <td>{{ $coupan->code }}</td>
                                <td> % {{ $coupan->percent }}</td>
                                <td>  {{$coupan->start_date_persian}}</td>
                                <td>  {{$coupan->end_date_persian }}</td>
                                <td>
                                    @if ($coupan->status == '0')
                                        <span class="badge-gold bg-danger-g">غیرفعال</span>
                                    @else
                                        <span class="badge-gold bg-success-g">فعال</span>
                                    @endif

                                </td>

                                <td class="actions">


                                    <a href="{{ route('admin.market.coupan.edit', $coupan) }}" class="btn-gold btn-gold-sm">&#x270F;</a>

                                    <form action="{{ route('admin.market.coupan.destroy', $coupan) }}" method="post"  class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-gold btn-gold-sm btn-gold-danger  delete-btn" type="submit">&#x1F5D1;</button>
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
                      {{$coupans->links()}}
                </div>
            </div>

        </div>

    </section>


@endsection
