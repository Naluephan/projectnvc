<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLog extends Model
{
    use HasFactory;
    protected $table = 'c_status_logs';
    protected $fillable = [
        'note',
        'status_log',
        'module_id',
        'module_name',
        'module_code',
        'emp_id',
    ];
    public function transactions()
    {
        return $this->belongsTo(TransactionRequest::class);
    }
}
