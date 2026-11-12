<?php

namespace App\Models\Admin\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Ticket extends Model{

        use SoftDeletes;

        protected $table='tickets';
        protected $guarded = ['id'];

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function priority(){
            return $this->belongsTo(TicketPriority::class);
        }


        public function admin(){
            return $this->belongsTo(TicketAdmin::class, 'reference_id');
        }



        public function category(){
            return $this->belongsTo(TicketCategory::class);
        }


        public function parent(){
            return $this->belongsTo($this, 'ticket_id');
        }

        public function answers() {
            return $this->hasMany($this, 'ticket_id');
        }



        //accessor
        public function getCreateAttribute(){
            $persian=Jalalian::forge($this->created_at)->format('Y/m/d H:i');
            return CalendarUtils::convertNumbers($persian);
        }


        //scopes

        public function scopeAllTicket(Builder $query){
            return $query->whereNull('ticket_id');
        }

        public function scopeLowPriority(Builder $query){
                  return $query->whereNull('ticket_id')
                                ->whereHas('priority', function($q) {
                                    $q->where('name', 'کم');
                            });
            }


        public function scopeMediumPriority(Builder $query){
                return $query->whereNull('ticket_id')
                         ->whereHas('priority', function($q) {
                            $q->where('name', 'متوسط');
                        });
        }

        public function scopeHighPriority(Builder $query){
            return $query->whereNull('ticket_id')
                        ->whereHas('priority', function($q) {
                            $q->where('name', 'زیاد');
                        });
        }


        public function scopeUrgentPriority(Builder $query){
            return $query->whereNull('ticket_id')
                         ->whereHas('priority', function($q) {
                            $q->where('name', 'فوری');
                        });
        }

        // ========== Scope های زمانی ==========

        /**  * تیکت‌های امروز  */
        public function scopeToday(Builder $query) {
            return $query->whereDate('created_at', today());
        }


        /*** تیکت‌های این هفته  */
        public function scopeThisWeek(Builder $query) {
            return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        }





}
