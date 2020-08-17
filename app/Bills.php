<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $fillable = [
        'social_reason', 'rfc', 'folio','company_id'
    ];
}
