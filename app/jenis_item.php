<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_item extends Model
{
		protected $table    = "jenis_items";
		protected $fillable = [
		'id', 'jenis_item'
		];

    
}
