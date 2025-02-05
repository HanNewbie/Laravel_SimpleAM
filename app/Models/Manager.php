<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'accountmanager';
    public $timestamps = false; 
    protected $primaryKey = 'NIKAM'; 
    public $incrementing = false; 
    protected $fillable = ['NIKAM', 'NamaAM', 'IdSegmen', 'NoHP', 'Email', 'IdTelegram'];

    //RELASI KE TABEL SEGMEN
    public function segmen()
    {
        return $this->belongsTo(Segmen::class, 'IdSegmen', 'IdSegmen');
    }
}
