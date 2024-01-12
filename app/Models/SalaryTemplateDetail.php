<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryTemplateDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'template_id',
        'detail',
        'position',
        'type',
    ];

    public function templateSalary(){
        return $this->belongsTo(SalaryTemplate::class,'template_id');
    }
}
