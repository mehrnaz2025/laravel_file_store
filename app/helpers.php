<?php


     function fa($number) {

        if (is_null($number) || $number === '') {
                return '۰';
            }

         $number = number_format($number);
         $persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
         $englishDigits = range(0, 9);

         return str_replace($englishDigits, $persianDigits, (string) $number);
    }
