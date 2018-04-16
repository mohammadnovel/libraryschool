<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengarang extends Model
{
    protected $table    = "pengarangs";
    protected $fillable = [
      'pengarang', 'no_telepon', 'alamat'
    ];
}
