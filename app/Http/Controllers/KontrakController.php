<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    public function index()
    {
       $kontrak = Kontrak::all();
       return view('admin.kontrak.index', ['kontrak'=>$kontrak]);
    }
}
