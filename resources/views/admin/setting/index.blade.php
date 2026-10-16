@extends('admin.layouts.master')
@section('title', ' تنظیمات سایت')

@section('content')

    <section>
        <div class="glass">
            <div class="section-header">
                <h3>💳  تنظیمات سایت </h3>
                @if ($setting)
                        <a href="{{ route('admin.setting.set') }}" class="btn-gold">ویرایش  </a>
                @else
                       <a href="{{  route('admin.setting.set')}}" class="btn-gold">➕ ایجاد </a>
                @endif

            </div>

            <div style="overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th># </th>
                            <th>عنوان </th>
                            <th> توضیحات </th>
                            <th> کلمات کلیدی </th>
                            <th>لوگو</th>
                            <th>آیکون</th>
                            <th>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($setting)
                            <tr>
                                <th>1</th>
                                <td>{{ $setting->title }}</td>
                                <td>{{ Str::limit($setting->description, 50) }}</td>
                                <td>{{ Str::limit($setting->keywords, 50) }}</td>
                                <td>
                                    <img src="{{ asset($setting->logo) }}" alt="" width="100" height="100">
                                </td>
                                <td>
                                    <img src="{{ asset($setting->icon) }}" alt="" width="100" height="100">
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                  <p style="font-size: 18px;font-weight: bolder">تنظیماتی یافت نشد</p>
                            </td>

                        </tr>

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
