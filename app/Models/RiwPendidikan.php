<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwPendidikan extends Model
{
    protected $table = 'riw_pendidikan';

    public function tingkatPendidikan()
    {
        return $this->belongsTo('App\Models\RefTingkatPendidikan','kode_tingkat_pendidikan', 'kode');
    }
}
