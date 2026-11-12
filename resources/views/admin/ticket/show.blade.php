@extends('admin.layouts.master')
@section('title', 'مشاهده تیکت ')

@section('content')
    <section>
        <div class="glass">
            <div class="detail-header">
                <a href="{{ route('admin.ticket.index') }}" class="back-btn text-decoraion-none"
                    style="text-decoration: none !important;">→ بازگشت به لیست تیکت ها</a>
                <h3 id="commentDetailTitle" style="color:var(--gold-light);font-size:1rem !important;">💬 تیکت
                    {{ $ticket->user->name ?? 'کاربر ناشناس' }}</h3>
            </div>

            <div class="original-item" id="commentOriginal">
                <div class="original-item-header">
                    <div class="original-item-user">
                        {{-- <div class="user-avatar-sm" id="commentAvatar">ع</div> --}}
                        <div>
                            <div class="user-name" id="commentUserName"> {{ $ticket->subject }}</div>
                            {{-- <div class="user-date" id="commentDate">  {{ $comment->create }}  </div> --}}
                        </div>
                    </div>

                    <div>
                        <span class="badge-gold bg-success-g" id="commentStatus">
                            @if ($ticket->status == 0)
                                <span class="badge-gold bg-warning-g" style="font-size: 1rem">باز</span>
                            @elseif ($ticket->status == 1)
                                <span class="badge-gold bg-success-g" style="font-size: 1rem">بسته</span>

                            @endif
                        </span>
                    </div>
                </div>
                <div class="original-item-content" id="commentContent"> {{ $ticket->description }} </div>
                <div class="original-item-meta">
                    <span><strong id="commentProduct">  {{ $ticket->user->name ?? 'کاربر ناشناس' }} </strong></span>
                    <span>📅 تاریخ ثبت: <strong id="commentRegDate"> {{ $ticket->create }} </strong></span>
                </div>

                <div class="action-buttons">
                    @if ($ticket->status == 0)
                        <a href="{{ route('admin.ticket.change-status', $ticket) }}"
                            class="btn-gold btn-gold-success">✗
                            بستن تیکت</a>
                    @else
                        <a href="{{ route('admin.ticket.change-status', $ticket) }}"
                            class="btn-gold btn-gold-danger">✓
                            باز کردن تیکت</a>
                    @endif


                </div>
            </div>

            <div class="replies-section">
                <h4>پاسخ (<span id="repliesCount">{{ $ticket->answers()->count() }}</span>)</h4>
                @if ($ticket->answers()->count() > 0)
                    <div id="repliesContainer">
                        @forelse ($ticket->answers as $answer)
                            <div class="reply-item admin">
                                <div class="reply-item-header">
                                    <div class="reply-user">
                                        <div class="reply-avatar admin">A</div>
                                        <div>
                                            <div class="reply-name">
                                                {{-- پشتیبان  <br/> --}}
                                                {{ $answer->admin->name ?? 'ادمین' }}
                                                {{-- <span class="reply-role admin-role">🛡️ مدیر</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reply-date"> {{ $answer->create }} <span style="font-size: 18px;">📅</span></div>
                                </div>
                                <div class="reply-content"> {{ $answer->description }}</div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                @endif

            </div>

            <div class="reply-form">
                <h4>✍️ ارسال پاسخ جدید</h4>
                <form action="{{ route('admin.ticket.reply',$ticket)}}" method="post">
                    @csrf

                    <textarea id="newReplyText" name="description" placeholder="پاسخ خود را اینجا بنویسید..."></textarea>
                    @error('description')
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


