@extends('admin.layouts.master')
@section('title', 'لیست بنر ها')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3>💳 لیست بنر ها </h3>
                <a href="{{ route('admin.content.banner.create') }}" class="btn-gold">➕ ایجاد بنر </a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در بنر ها..."
                    onkeyup="searchTable('payments-table', this.value)">
            </div>



            <div style="overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> عنوان</th>
                            <th> توضیحات </th>
                            <th> آدرس </th>
                            <th> متن بج </th>
                            <th> آیکن بج </th>
                            <th> رنگ پس زمینه بج </th>
                            <th>موقعیت </th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($banners as  $key=>$banner)
                            <tr data-status="success">
                                <td>{{ $banners->firstItem() + $key }}</td>
                                <td>{{ $banner->title }}</td>
                                <td>{{ $banner->description }}</td>
                                <td>{{ $banner->link_url }}</td>
                                <td>{{ $banner->badge_text }}</td>
                                <td>{{ $banner->badge_icon }}</td>
                                <td>{{ $banner->badge_color }}</td>
                                <td>{{ $banner->positionBanner }}</td>
                                <td>
                                    @if ($tag->status == "0")
                                        <span class="badge-gold bg-danger-g">غیرفعال</span>
                                    @else
                                        <span class="badge-gold bg-success-g">فعال</span>
                                    @endif
                                </td>
                                <td>{{ $banner->create }}</td>

                                <td class="actions">
                                    <a href="{{ route('admin.content.banner.edit', $banner) }}" class="btn-gold btn-gold-sm"
                                        style="font-size: 16px;">&#x270F;</a>
                                    <form action="{{ route('admin.content.banner.destroy', $banner) }}" method="post"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-gold btn-gold-sm btn-gold-danger  delete-btn"
                                            style="font-size: 20px">&#x1F5D1;</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-secodary text-center text-white font-bold"
                                        style="font-size: 15px"> هیچ داده ای وجود ندارد </div>
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{ $banners->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
