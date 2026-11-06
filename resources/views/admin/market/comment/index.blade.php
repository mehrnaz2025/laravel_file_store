@extends('admin.layouts.master')
@section('title', 'لیست دسته بندی ها')

@section('content')

            <section>
        <div class="glass">
            <div class="section-header">
                <h3 style="font-size:20px;color:white;">    &#x1F4AD;   نظرات  </h3>
                {{-- <a   href="{{route('admin.market.category.create')}}"  class="btn-gold">➕ افزودن دسته</a> --}}
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در نظرات..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>

        <!-- دکمه‌های فیلتر وضعیت  نظرات -->
        <div class="status-filter-buttons">
          <a href="{{route('admin.market.comment.index')}}" class="status-btn" onclick="filterByStatus(this, '')" style="text-decoration: none;>
            <span class="btn-icon" style="font-size: 25px;">&#x1F4AD;</span>
            <span>همه نظرات</span>
            <span class="btn-count">  {{App\Models\Admin\market\Comment::allComments()->count() }}  </span>
          </a>

          <a href="" class="status-btn"   data-filter="success" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✓</span>
            <span>نظرات تایید نشده</span>
            <span class="btn-count"> - </span>
          </a>


          <a href="" class="status-btn" data-filter="failed" onclick="filterByStatus(this, '')"  style="text-decoration: none;">
            <span class="btn-icon">✗</span>
            <span>نظرات تایید شده</span>
            <span class="btn-count"> - </span>
          </a>
        </div>

            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                  <th>#</th>
                            <th>نظر</th>
                            {{-- <th>پاسخ به</th> --}}
                            <th>نویسنده نظر</th>
                            <th>کد محصول</th>
                            <th>محصول</th>
                            <th>وضعیت </th>
                            <th>تاریخ </th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                          @forelse ($comments as $key => $comment)
                          <tr>
                            <th>{{$comments->firstItem()+$key}}</th>
                            <td>{{ Str::limit($comment->body, 15) }}</td>
                            {{-- <td>{{ $comment->parent_id ? Str::limit($comment->parent->body, 15) : 'نظر اصلی' }}</td> --}}
                            <td>{{ $comment->user->email ?  $comment->user->email :  $comment->user->mobile}}</td>
                            <td>{{ $comment->commentable_id }}</td>
                            <td>{{ $comment->commentable->name }}</td>
                             <td>
                                @if ($comment->approved == 0)
                                    <span class="badge-gold bg-warning-g"  style="font-size: 1rem">انتظار</span>
                                @elseif ($comment->approved == 1)
                                    <span class="badge-gold bg-success-g" style="font-size: 1rem">تایید</span>
                                @else
                                     <span class="badge-gold bg-danger-g"  style="font-size: 1rem">رد</span>
                                @endif

                              </td>
                              <td>{{ $comment->create }}</td>

                            <td class="actions">
                                <a href="{{route('admin.market.comment.show',$comment)}}" class="btn-gold btn-gold-sm btn-gold-info" title="پاسخ ها"  style="font-size:17px;color:white;"> &#x1F4AD; </a>
                                @if($comment->approved == 0)
                                     <a href="{{ route('admin.market.comment.approved', $comment->id)}} "class="btn-gold btn-gold-sm btn-gold-success" title="تایید">  &#10004;   </a>
                                @elseif($comment->approved == 1)
                                    <a href="{{ route('admin.market.comment.approved', $comment->id)}} "class="btn-gold btn-gold-sm btn-gold-danger" title="رد">   &#10008;   </a>
                                @endif
                            </td>

                        </tr>
                        @empty
                            <tr>
                            <td colspan="8">
                                <div class="text-center w-100">
                                <h5 class="text-center" style="font-size:14px;">   نظری یافت نشد   </h5>
                            </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex col-12 justify-content-center w-100 mt-3">
                      {{$comments->links()}}
                </div>
            </div>

        </div>

    </section>


@endsection
