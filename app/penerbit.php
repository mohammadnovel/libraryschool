<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penerbit extends Model
{
  protected $table    = "penerbits";
  protected $fillable = [
    'penerbit', 'no_telepon', 'alamat'
  ];
}
