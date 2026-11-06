<?php

namespace App\Models\Admin\Market;

use App\Models\User;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model{
     use SoftDeletes,CascadeSoftDeletes;


    protected $cascadeDeletes=['answers'];
    protected $table='comments';
    protected $guarded=['id'];


    public function commentable(){
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function parent(){
        return $this->belongsTo($this, 'parent_id');
    }

    public function answers() {
        return $this->hasMany($this, 'parent_id');
    }


}
