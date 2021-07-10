<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'visitor_name', 'contact_no', 'block_no', 'unit_no','nric_no', 'entry_at','exit_at',
    ];
}
