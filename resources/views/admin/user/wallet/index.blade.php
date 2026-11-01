@extends('admin.layouts.master')

@section('title', 'لیست کیف پول ها')

@section('content')

    <section>
        <div class="glass">
               <div class="section-header">
                <h3>&#x1F4B0; مدیریت کیف پول</h3>
                <a href="{{ route('admin.user.wallet.create') }}" class="btn-gold">➕ افزودن کیف پول</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="جستجو در کیف پول..."
                    onkeyup="searchTable('categories-table', this.value)">
            </div>



            <div style="overflow-x:auto">
                <table id="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کاربر</th>
                            <th>موجودی (ت)</th>
                            <th>تراکنش</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wallets as $key=>$wallet)
                            <tr>
                                <th>{{ $wallets->firstItem() + $key }}</th>
                                <td>{{ $wallet->user->email ?? $wallet->user->mobile  }}</td>
                                <td>{{ $wallet->balance }}</td>
                                <td>{{ $wallet->transactions()->count() }}</td>
                                {{-- <td class="actions">
                                    <a href="{{ route('admin.user.wallet.edit', $wallet) }}"   class="btn-gold btn-gold-sm">&#x270F;</a>
                                    <form action="{{ route('admin.user.wallet.destroy', $wallet) }}" method="post"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-gold btn-gold-sm btn-gold-danger delete-btn"
                                            style="font-size: 18px">&#x1F5D1;</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex col-12 justify-content-center w-100 mt-3">
                    {{ $wallets->links() }}
                </div>
            </div>




        </div>


    </section>




@endsection
