<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
       $layanan = Layanan::all();
       return view('admin.layanan.index', ['layanan'=>$layanan]);
    }
}
