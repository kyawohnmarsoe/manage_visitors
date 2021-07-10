<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'block_no', 'unit_no', 'occupant_name', 'contact_no','current_visitors',
    ];
    protected $casts = [
        'current_visitors' => 'array',
    ];
}
