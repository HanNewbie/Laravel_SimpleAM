<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segmen extends Model
{
    protected $table = 'segmen';
    public $timestamps = false; 
    protected $primaryKey = 'IdSegmen'; 
    public $incrementing = false; 
    protected $fillable = ['NamaSegmen'];
}
