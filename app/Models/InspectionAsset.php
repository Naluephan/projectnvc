<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionAsset extends Model
{
    use HasFactory;
    protected $table = 'hr_inspection_assets';
    protected $fillable = [
        'asset_and_supply_id',
        'note',
        'user_id',
        'due_date'
    ];
    public function assets(){
        return $this->belongsTo(AssetsAndSupply::class,'id','asset_and_supply_id');
    }
}
