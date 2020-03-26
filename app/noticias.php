<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticias extends Model
{
    protected $table = 'noticias';
//	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','titulo','resumen','url_noticia', 'url_imagen','created_at'];
}
