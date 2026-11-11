@extends('admin.layouts.master')
@section('title', 'مشاهده تیکت ')

@section('content')
    <section>
        <div class="glass">
            <div class="detail-header">
                <a href="{{ route('admin.market.comment.index') }}" class="back-btn text-decoraion-none"
                    style="text-decoration: none !important;">→ بازگشت به لیست نظرات</a>
                <h3 id="commentDetailTitle" style="color:var(--gold-light);font-size:1rem !important;">💬 نظر
                    {{ $comment->user->name ?? 'کاربر ناشناس' }}</h3>
            </div>

            <div class="original-item-comment" id="commentOriginal">
                <div class="original-item-header">
                    <div class="original-item-user">
                        {{-- <div class="user-avatar-sm" id="commentAvatar">ع</div> --}}
                        <div>
                            <div class="user-name" id="commentUserName"> {{ $comment->user->name ?? 'کاربر ناشناس' }} </div>
                            {{-- <div class="user-date" id="commentDate">  {{ $comment->create }}  </div> --}}
                        </div>
                    </div>

                    <div>
                        <span class="badge-gold bg-success-g" id="commentStatus">
                            @if ($comment->approved == 0)
                                <span class="badge-gold bg-warning-g" style="font-size: 1rem">انتظار</span>
                            @elseif ($comment->approved == 1)
                                <span class="badge-gold bg-success-g" style="font-size: 1rem">تایید</span>
                            @else
                                <span class="badge-gold bg-danger-g" style="font-size: 1rem">رد</span>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="original-item-content" id="commentContent"> {{ $comment->body }} </div>
                <div class="original-item-meta">
                    <span>📦 محصول: <strong id="commentProduct"> {{ $comment->commentable->name }} </strong></span>
                    <span>📅 تاریخ ثبت: <strong id="commentRegDate"> {{ $comment->create }} </strong></span>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('admin.market.comment.approved', $comment) }}" class="btn-gold btn-gold-success">✓
                        تایید نظر</a>
                    <a href="{{ route('admin.market.comment.unApproved', $comment) }}" class="btn-gold btn-gold-danger">✗ رد
                        نظر</a>
                </div>
            </div>

            <div class="replies-section">
                <h4>پاسخ (<span id="repliesCount">{{ $comment->answers()->count() }}</span>)</h4>
                @if ($comment->answers()->count() > 0)
                    <div id="repliesContainer">
                        @forelse ($comment->answers as $answer)
                            <div class="reply-item admin">
                                <div class="reply-item-header">
                                    <div class="reply-user">
                                        <div class="reply-avatar admin">A</div>
                                        <div>
                                            <div class="reply-name">
                                                {{-- پشتیبان  <br/> --}}
                                                {{ $answer->user->name }}
                                                {{-- <span class="reply-role admin-role">🛡️ مدیر</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reply-date">📅 {{ $answer->create }}</div>
                                </div>
                                <div class="reply-content"> {{ $answer->body }}</div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                @endif

            </div>

            <div class="reply-form">
                <h4>✍️ ارسال پاسخ جدید</h4>
                <form action="{{ route('admin.market.comment.answer', $comment) }}" method="post">
                    @csrf
                    <textarea id="newReplyText" name="body" placeholder="پاسخ خود را اینجا بنویسید..."></textarea>
                    @error('body')
                        <span class="my-1 text-danger rounded">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                    <div style="display:flex; gap:10px; justify-content:flex-end;">
                        <button class="btn-gold btn-gold-success" type="submit">📤 ارسال پاسخ</button>
                    </div>
                </form>
            </div>

        </div>
    </section>

@endsection



{{-- @section('scripts')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection --}}
