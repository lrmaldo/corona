<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notificaciones extends Model
{
    protected $table = 'notifications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['expo_token'];
}
