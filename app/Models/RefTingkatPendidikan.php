<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefTingkatPendidikan extends Model
{
    protected $table = 'ref_tingkat_pendidikan';

    public function riwPendidikan()
    {
        return $this->hasMany('App\Models\RiwPendidikan', 'kode_tingkat_pendidikan', 'kode');
    }
}
