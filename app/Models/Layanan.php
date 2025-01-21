<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Layanan extends Model
{
    protected $table = 'layanan';
    public $timestamps = false; 
    protected $primaryKey = 'SID'; 
    public $incrementing = false; 
    protected $fillable = ['NoBilling', 'SID', 'ProdName', 'Bandwidth', 'Satuan', 'NilaiLayanan'];

    public function datacustomer()
    {
        return $this->belongsTo(Customer::class, 'NoBilling', 'NoBilling');
    }
    
}
