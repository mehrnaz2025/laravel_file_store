<?php

namespace App\Models\Admin\Market;

use App\Models\User;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Comment extends Model{
     use SoftDeletes,CascadeSoftDeletes;


    protected $cascadeDeletes=['answers'];
    protected $table='comments';
    protected $guarded=['id'];


    public function commentable(){
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function parent(){
        return $this->belongsTo($this, 'parent_id');
    }

    public function answers() {
        return $this->hasMany($this, 'parent_id');
    }


    //accessor
    public function getCreateAttribute(){
        $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
        return CalendarUtils::convertNumbers($persian);
    }

    //scope method
           public function scopeAllComments(Builder $query){
           return $query;
        }


}
