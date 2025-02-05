<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Manager;

class Customer extends Model
{
    protected $table = 'datacustomer';
    public $timestamps = false;
    protected $primaryKey = 'NoBilling'; 
    public $incrementing = false; 
    protected $fillable = [
        'NamaCust', 'NoBilling', 'NIPNAS', 'AlamatCust', 'NamaPIC', 'NoHPPIC', 'NIKAM', 'EmailCust'
    ];

    //RELASI KE TABEL ACCOUNT MANAGER
    public function accountManager()
    {
        return $this->belongsTo(Manager::class, 'NIKAM', 'NIKAM');
    }
}
