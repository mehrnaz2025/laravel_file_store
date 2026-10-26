<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
class File extends Model{

        protected $table='files';
        protected $guarded=['id'];
        //protected $appends = ['icon'];




        // protected array $mime_types = [
        //         0 => 'audio/mpeg',
        //         1 => 'audio/wav',
        //         2 => 'application/zip',
        //         3 => 'application/x-rar-compressed',
        //         4 => 'application/x-7z-compressed',
        //         5 => 'application/x-tar',
        //         6 => 'application/pdf',
        //         7 => 'text/plain',
        //         8=>  'application/x-rar'
        //     ];

           protected array $fileIcons = [
                0 => '&#127925;',  // 🎵 audio/mpeg
                1 => '&#127926;',  // 🎶 audio/wav
                2 => '&#128230;',  // 📦 application/zip
                3 => '&#128230;',  // 📦 application/x-rar-compressed
                4 => '&#128230;',  // 📦 application/x-7z-compressed
                5 => '&#128230;',  // 📦 application/x-tar
                6 => '&#128196;',  // 📄 application/pdf
                7 => '&#128221;',  // 📝 text/plain
                8 => '&#128230;',  // 📦 application/x-rar
            ];





        //accessor
            public function getCreateAttribute(){
                $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
                return CalendarUtils::convertNumbers($persian);
            }


            public function getIconAttribute(){
                return html_entity_decode($this->fileIcons[$this->type], ENT_HTML5, 'UTF-8');
            }


            public function product(){
                    return $this->belongsTo(Product::class,'product_id','id');
                }



}
