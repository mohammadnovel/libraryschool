<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public function klasifikasi()
    {
      return $this->belongsTo(klasifikasi::class);
    }

}
