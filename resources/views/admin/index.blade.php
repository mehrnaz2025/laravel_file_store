@extends('admin.layouts.master')
@section('title', 'داشبورد')

@section('content')

    <section>
        <div class="stats">
            <div class="stat-card"><span class="icon">💰</span>
                <div class="label">فروش کل (تومان)</div>
                <div class="value">1,460,000</div>
            </div>
            <div class="stat-card"><span class="icon">📦</span>
                <div class="label">محصولات</div>
                <div class="value">4</div>
            </div>
            <div class="stat-card"><span class="icon">📁</span>
                <div class="label">فایل‌ها</div>
                <div class="value">6</div>
            </div>
            <div class="stat-card"><span class="icon">👥</span>
                <div class="label">کاربران</div>
                <div class="value">3</div>
            </div>
            <div class="stat-card"><span class="icon">🛒</span>
                <div class="label">سفارشات</div>
                <div class="value">3</div>
            </div>
            <div class="stat-card"><span class="icon">🎫</span>
                <div class="label">تیکت‌های باز</div>
                <div class="value">2</div>
            </div>
        </div>
        <div class="charts">
            <div class="glass">
                <h3 style="color:var(--gold-light);margin-bottom:15px">📈 نمودار فروش ۷ روز اخیر</h3>
                <canvas id="salesChart" height="100"></canvas>
            </div>
            <div class="glass">
                <h3 style="color:var(--gold-light);margin-bottom:15px">🎯 فروش دسته‌بندی‌ها</h3>
                <canvas id="categoryChart" height="200"></canvas>
            </div>
        </div>
        <div class="glass">
            <h3 style="color:var(--gold-light);margin-bottom:15px">🔥 آخرین سفارشات</h3>
            <table>
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>کاربر</th>
                        <th>مبلغ</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>#1003</td>
                        <td>رضا کریمی</td>
                        <td>890,000</td>
                        <td><span class="badge-gold bg-warning-g">در انتظار</span></td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td>مریم احمدی</td>
                        <td>120,000</td>
                        <td><span class="badge-gold bg-info-g">پردازش</span></td>
                    </tr>
                    <tr>
                        <td>#1001</td>
                        <td>علی رضایی</td>
                        <td>450,000</td>
                        <td><span class="badge-gold bg-success-g">تحویل</span></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </section>


@endsection

@section('scripts')
    @parent
    <script src="{{ asset('admin-assets/js/chart.js') }}"></script>
@endsection
