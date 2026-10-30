@extends('admin.layouts.master')
@section('title', 'ایجاد کد تخفیف ')

@section('style')
   <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')
        <div class="modal-content">
    <div class="modal-header">
        <h5 class=""> افزودن تخفیف</h5>
    </div>
            <form action="{{ route('admin.market.coupan.store') }}" method="post">
                @csrf
                <div class="modal-body">
                        <div class="row">

                            <div class="mb-3 col col-md-4">
                                <label class="form-label"> عنوان کد</label>
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                @error('code')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>


                            <div class="mb-3 col col-md-2">
                                <label class="form-label"> درصد تخفیف</label>
                                <input type="number"  min="1"  class="form-control" name="percent" value="{{ old('percent') }}">
                                @error('percent')
                                    <div class="p-1 my-1 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="mb-3 col col-md-2">
                                <label class="form-label">وضعیت</label>
                                <select class="form-select" name="status">
                                    <option value="0" @if (old('status') == '0') selected @endif> غیرفعال</option>
                                    <option value="1" @if (old('status') == '1') selected @endif> فعال</option>
                                </select>
                                @error('status')
                                    <div class="p-1 my-2 text-danger rounded "><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="form-group col col-12 col-md-2 mt-1">
                                <label> زمان شروع تخفیف:</label>

                                <input type="hidden" name="start_date" id="start_date">
                                <input type="text"  id="start_date_display" class="form-control">

                                @error('start_date')
                                    <span style="color: #ef4444; font-size: 15px; margin-top: 5px; display:block;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col col-12 col-md-2 mt-1">
                                <label> زمان پایان تخفیف:</label>

                                <input type="hidden" name="end_date" id="end_date">
                                <input type="text"  id="end_date_display" class="form-control">

                                @error('start_date')
                                    <span style="color: #ef4444; font-size: 15px; margin-top: 5px; display:block;">{{ $message }}</span>
                                @enderror
                            </div>




                        </div>
                </div>
                <div class="modal-footer">
                     <a href="{{ route('admin.market.product.index') }}"  class="btn-gold btn-gold-danger mx-2">برگشت</a>
                    <button type="submit" class="btn-gold btn-gold-success">&#x1F4BE; ذخیره</button>
                </div>
            </form>
        </div>

@endsection



 @section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
     <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
      <script>
            $(document).ready(function () {
                $('#start_date_display').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#start_date'
                })

              $('#end_date_display').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#end_date'
                })
            });
     </script>


@endsection
