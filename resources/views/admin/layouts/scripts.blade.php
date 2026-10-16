@section('scripts')
    <script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/popper.js') }}"></script>
    <script src="{{ asset('admin-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin-assets/js/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script>
        // تنظیمات Toast برای پیام‌های موفقیت
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-left',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });


        @if (session('success'))
            Swal.fire({
                title: 'خطا',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'باشه',
                confirmButtonColor: '#10b981',
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                customClass: {
                    popup: 'text-right'
                }
            });
        @endif




        // نمایش پیام موفقیت

        @if (session('success'))
            Swal.fire({
                title: 'موفقیت‌آمیز!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'باشه',
                confirmButtonColor: '#10b981',
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                customClass: {
                    popup: 'text-right'
                }
            });
        @endif




        document.addEventListener('click', function(e) {
            // پیدا کردن دکمه حذف
            const deleteBtn = e.target.closest('.delete-btn');

            if (deleteBtn) {
                e.preventDefault();
                e.stopPropagation();

                const form = deleteBtn.closest('.delete-form');

                Swal.fire({
                    title: 'آیا مطمئن هستید؟',
                    text: 'این منو و تمام زیرمنوهای آن حذف خواهند شد!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'بله، حذف شود',
                    cancelButtonText: 'انصراف',
                    reverseButtons: true,
                    customClass: {
                        popup: 'custom-swal-popup'
                    },

                    allowOutsideClick: true,
                    allowEscapeKey: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // نمایش لودینگ
                        Swal.fire({
                            title: 'در حال حذف...',
                            text: 'لطفاً صبر کنید',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            customClass: {
                                popup: 'custom-swal-popup'
                            }
                        });

                        // ارسال فرم بعد از یک تاخیر کوتاه
                        setTimeout(() => {
                            form.submit();
                        }, 500);
                    }

                });
            }
        });
    </script>

@show
