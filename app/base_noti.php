<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class base_noti extends Model
{
    protected $table = 'base_noti';
    //	public $timestamps = false;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['id','titulo','body'];  
}
