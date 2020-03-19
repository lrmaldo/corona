<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class casos extends Model
{
    protected $table = 'casos';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','region','lat','long', 'confirmados','sospechosos','recuperados','negativos'];
}
