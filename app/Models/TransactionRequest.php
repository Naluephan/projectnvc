<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'module_id',
        'module_name',
        'detail',
        'status_logs_id',
    ];
    public function statuslogs()
    {
        return $this->belongsTo(StatusLog::class);
    }
}
