<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenSiasn extends Model
{
    protected $table = 'api_siasn';
    protected $fillable = [
    	'api_ws',
        'bkn_sso'
    ];
}
