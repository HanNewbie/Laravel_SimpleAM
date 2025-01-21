<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;


class DashboardController extends Controller
{
   public function index(Request $request)
    {
        $filterSegmen = $request->input('segmen');

        $data = Dashboard::when($filterSegmen, function ($query, $filterSegmen) {
            $query->where('NamaSegmen', $filterSegmen);
        })->get();

        return view('welcome', compact('data', 'filterSegmen'));
    }

}
