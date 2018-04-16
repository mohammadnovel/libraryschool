<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barcode extends Model
{
    protected $table 	= "barcodes";
    protected $fillable	= [
    	 'kd_item', 'judul', 'barcode_kode'
    ];
}
