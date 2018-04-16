<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
      protected $table      = "items";
      protected $fillable   = [
      'kd_item', 'jenis_item_id', 'klasifikasi_id',
      'kategori_id', 'label_rak_id', 'judul_item', 'pengarang',
      'penerbit', 'isbn', 'jumlah', 'thn_terbit', 'kata_kunci',
      'resensi', 'daftar_isi', 'status_pinjam', 'foto', 'file',
      'tgl_masuk', 'kondisi'
      ];
      protected $primaryKey = "kd_item";
      protected $keyType    = 'string';
      
      public function jenis_item()
      {
      return $this->belongsTo(jenis_item::class);
      }
      
      public function klasifikasi()
      {
      return $this->belongsTo(klasifikasi::class);
      }
}
