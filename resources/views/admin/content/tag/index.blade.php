@extends('admin.layouts.master')
@section('title', 'لیست تگ ها')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3>💳 لیست تگ ها </h3>
                <a href="{{ route('admin.content.menu.create') }}" class="btn-gold">➕ ایجاد منو</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در تگ ها..."
                    onkeyup="searchTable('payments-table', this.value)">
            </div>

            <div class="status-filter-buttons">
                <a href="{{ route('admin.content.tag.index') }}" class="status-btn" data-filter="all" onclick="filterByStatus(this, '')"
                    style="text-decoration: none;">
                    <span class="btn-icon">📋</span>
                    <span>همه تگ ها</span>
                    <span class="btn-count">   {{  App\Models\Admin\Content\Tag::allTag()->count()  }}  </span>
                </a>
                <a href="{{ route('admin.content.tag.active-tag') }}" class="status-btn" data-filter="success" onclick="filterByStatus(this, '')"
                    style="text-decoration: none;">
                    <span class="btn-icon">✓</span>
                    <span>فعال</span>
                    <span class="btn-count"> {{  App\Models\Admin\Content\Tag::activeTag()->count()  }} </span>
                </a>
                <a href="{{ route('admin.content.tag.inactive-tag') }}" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"
                    style="text-decoration: none;">
                    <span class="btn-icon">✗</span>
                    <span>غیرفعال</span>
                    <span class="btn-count"> {{  App\Models\Admin\Content\Tag::inactiveTag()->count()  }} </span>
                </a>

            </div>

            <div style="overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام تگ</th>
                            <th>نامک (Slug)</th>
                            {{-- <th>محصولات مرتبط</th> --}}
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($tags as  $key=>$tag)
                            <tr data-status="success" style="">
                                <td>{{$tags->firstItem() + $key}}</td>
                                <td>
                                    <span class="border rounded py-1 px-2" style="background:{{$tag->color}};color:black;border-color:rgba(231,76,60,0.4)">
                                        <span class="tag-color-dot" style="background:#e74c3c"> </span>
                                        {{$tag->name}}
                                     </span>
                                </td>
                               <td style="color:var(--silver);font-size:12px">  {{$tag->slug}} </td>
                                <td>
                                    @if ($tag->status == "0")
                                        <span class="badge-gold bg-danger-g">غیرفعال</span>
                                    @else
                                        <span class="badge-gold bg-success-g">فعال</span>
                                    @endif

                                </td>
                                <td>{{ $tag->create }}</td>
                                <td class="actions">
                                    <a href="{{route('admin.content.tag.edit',$tag)}}" class="btn-gold btn-gold-sm" style="font-size: 16px;">&#x270F;</a>
                                    <form action="{{ route('admin.content.tag.destroy',$tag) }}" method="post" class="delete-form">
                                            @csrf
                                            @method('DELETE')

                                           <button  type="submit" class="btn-gold btn-gold-sm btn-gold-danger  delete-btn" style="font-size: 20px">&#x1F5D1;</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                               <tr>
                                   <td colspan="7"> <div class="alert alert-secodary text-center text-white font-bold" style="font-size: 15px"> هیچ داده ای وجود ندارد </div></td>
                               </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
                   <div class="row">
            <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{$tags->links()}}
            </div>
        </div>
        </div>
    </section>

@endsection
