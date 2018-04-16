<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
  protected $table = "anggotas";
  protected $fillable = [
    'kd_anggota', 'nama', 'jalan', 'rt', 'rw', 'kec', 'desa', 'kotakab', 'provinsi', 'kode_pos', 'status_id', 'no_telepon', 'foto', 'rayon', 'rombel', 'kelas', 'tahun_ajaran', 'nisn'
  ];
  protected $primaryKey = "kd_anggota";
  // protected $keyType = 'float';
}
