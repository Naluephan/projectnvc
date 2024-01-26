<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryEmployees extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'salary',
        'diligence_allowance', //เบี้ยขยัน
        'overtime', //ล่วงเวลา
        'fuel_cost', //ค่าน้ำมัน
        'bonus', 
        'interest', //ดอกเบี้ย
        'commission', //ค่าคอม
        'get_orthers', //อื่นๆ
        'total_earning', //รวมรายได้
        'social_security_fund', //ประกันสังคม
        'withholding_tax', //ภาษีหัก ณ ที่จ่าย
        'deposit', //เงินฝาก
        'absent_leave_late', //ขาดงาน ลา มาสาย
        'company_loan', //เงินกู้ของบริษัท
        'deposit_fund', //กองทุนเงินฝาก
        'deduc_others',//?
        'total_deductions', //การหักเงินทั้งหมด
        'net_pay', //ยอดสุทธิ
        'day',
        'month',
        'year',
    ];
    
}
