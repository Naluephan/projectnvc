<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetAndSupplyTransaction extends Model
{
    use HasFactory;
    protected $table = 'hr_asset_and_supply_transactions';
    protected $fillable = [
        'emp_id',
        'company_id',
        'department_id',
        'amount',
        'assets_and_supply_id',
        'details',
        'actions',
        'transaction_requests_id'
    ];

    public function pickupTools(){
        return $this->belongsTo(AssetsAndSupply::class,'id', 'assets_and_supply_id');
    }

    public function company(){
        return $this->hasOne(Company::class,'id', 'company_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }
    public function emp(){
        return $this->belongsTo(Employee::class,'id','emp_id');
    }
    public function transactions(){
        return $this->belongsTo(TransactionRequest::class);
    }
}
