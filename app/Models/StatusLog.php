<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'status_name',
        'status_number',
        'status_color',
        'emp_id',
        'module_id',
        'module_name',
    ];
    public function transactions()
    {
        return $this->belongsTo(TransactionRequest::class);
    }
}
