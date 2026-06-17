<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferRequest extends Model
{
    protected $fillable = [

        'file_id',
        'requested_by',
        'from_department',
        'to_department',
        'target_user',
        'status',
    ];
}
