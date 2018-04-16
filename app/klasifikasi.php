<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class klasifikasi extends Model
{
    public function jenis_item()
    {
      return $this->belongsTo(jenis_item::class);
    }

    protected $table = "klasifikasis";
    protected $fillable = [
      'id', 'klasifikasi', 'jenis_item_id'
    ];
}
