<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreTransaction extends Model
{
    use HasFactory;
    protected $table = 'hr_store_transactions';
    protected $fillable = [
        'emp_id',
        'department_id',
        'amount',
        'store_id',
        'module_id',
        'module_name',
        'item_id',
        'item_name',
        'to_emp_id',
        'to_store_id',
        'action'
    ];
    public function stores(){
        return $this->belongsTo(Store::class);
    }
    public function items(){
        return $this->belongsTo(AssetsAndSupplys::class,'id','item_id');
    }
    public function modules(){
        return $this->belongsTo(AssetAndSupplyTransaction::class,'id','module_id');
    }
}
