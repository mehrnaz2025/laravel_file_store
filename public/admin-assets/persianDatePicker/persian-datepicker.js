   $(document).ready(function() {
        $('#expire_at_display').persianDatepicker({
            format: 'YYYY/MM/DD HH:mm:ss',
            initialValue: false,
            minDate: new persianDate().valueOf(),
            calendar: {
                persian: {
                    locale: 'fa'
                }
            },
            timePicker: {
                enabled: true,
                step: 1,
                hour: {
                    enabled: true,
                    step: 1
                },
                minute: {
                    enabled: true,
                    step: 1
                },
                second: {
                    enabled: false,
                    step: 1
                }
            },
            navigator: {
                enabled: true,
                scroll: {
                    enabled: false
                },
                text: {
                    btnNextText: '›',
                    btnPrevText: '‹'
                }
            },
            onSelect: function(unix) {
                // تبدیل تاریخ شمسی انتخاب شده به میلادی برای ذخیره در دیتابیس
                var pd = new persianDate(unix);
                var gregorianDate = pd.toDate(); // تبدیل به Date object میلادی

                // فرمت مناسب برای لاراول
                var year = gregorianDate.getFullYear();
                var month = String(gregorianDate.getMonth() + 1).padStart(2, '0');
                var day = String(gregorianDate.getDate()).padStart(2, '0');
                var hours = String(gregorianDate.getHours()).padStart(2, '0');
                var minutes = String(gregorianDate.getMinutes()).padStart(2, '0');
                var seconds = String(gregorianDate.getSeconds()).padStart(2, '0');

                var gregorianString = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

                // قرار دادن در فیلد مخفی
                $('#expire_at_gregorian').val(gregorianString);

                console.log('تاریخ شمسی:', unix);
                console.log('تاریخ میلادی:', gregorianString);
            }
        });
    });
