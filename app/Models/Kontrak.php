<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = 'kontrak';
    public $timestamps = false; 
    protected $primaryKey = 'Id'; 
    public $incrementing = false; 
    protected $fillable = ['Id', 'NoKontrak', 'NoBilling', 'FirstDate', 'EndDate'];

    //RELASI KE TABEL DATACUSTOMER
    public function datacustomer()
    {
        return $this->belongsTo(Customer::class, 'NoBilling', 'NoBilling');
    }
}
