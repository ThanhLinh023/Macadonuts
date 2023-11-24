<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VouchersModel extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    protected $primaryKey = 'voucher_code';
}
