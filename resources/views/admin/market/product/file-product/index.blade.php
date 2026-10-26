@extends('admin.layouts.master')
@section('title', 'لیست فایل های محصول')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3>  📦 مدیریت فایل های محصول : {{ $product->name }}  </h3>
                <a   href="{{ route('admin.market.product-file.create',$product) }}"  class="btn-gold">➕ افزودن فایل</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در فایل ها..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>


            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>آیکن فایل</th>
                            <th> عنوان</th>
                            <th>پیش نمایش</th>
                            <th> نوع فایل</th>
                            <th>  تاریخ ایجاد </th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                         @forelse ($files as $key=>$file)
                          <tr>
                            <th>{{ $files->firstItem() + $key }}</th>
                                <td>  {{ $file->icon }}  </td>
                                <td>{{ $file->title }}</td>
                                <td>
                                    @if ($file->is_free_preview == '0')
                                        <span class="badge-gold bg-danger-g">  غیر رایگان  </span>
                                    @else
                                        <span class="badge-gold bg-success-g"> رایگان </span>
                                    @endif
                                </td>
                                <td>{{ $file->mime_type }}</td>
                                <td>{{ $file->create }}</td>

                            <td class="actions">
                                    <a href="{{ route('admin.market.product-file.edit', ['file'=>$file,'product'=>$product]) }}" class="btn-gold btn-gold-sm">&#x270F;</a>

                                    <form action="{{ route('admin.market.product-file.destroy',['file'=>$file , 'product'=> $product]) }}" method="post"  class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-gold btn-gold-sm btn-gold-danger delete-btn" type="submit">&#x1F5D1;</button>
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
                       {{ $files->links() }}
                </div>
            </div>

        </div>

    </section>


@endsection
