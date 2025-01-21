<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class KontrakController extends Controller
{
    public function index()
    {
       $kontrak = Kontrak::with('datacustomer')->get();
       return view('admin.kontrak.index', ['kontrak'=>$kontrak]);
    }

    public function create()
    {
        $NoBilling  = Customer::all();
        return view('admin.kontrak.create', compact('NoBilling'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'NoKontrak' => 'required|string|max:255',
                'NoBilling' => 'required|exists:datacustomer,NoBilling',
                'FirstDate' => 'required|date',
                'EndDate' => 'required|date',
            ]);

            $randomId = mt_rand(100000, 999999); 

            while (Kontrak::where('Id', $randomId)->exists()) {
                $randomId = mt_rand(100000, 999999);
            }

            $request['Id'] = $randomId;

            Kontrak::create($request->all());

            return redirect()->route('admin.kontrak.index')->with('success', 'Data kontrak berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit($Id)
    {
        $kontrak = Kontrak::findOrFail($Id);
        $NoBilling  = Customer::all();
        return view('admin.kontrak.edit', compact('kontrak', 'NoBilling'));
    }  

    public function update(Request $request, $Id)
    {        
        $request->validate([
           'NoKontrak' => 'required|string|max:255',
            'NoBilling' => 'required|exists:datacustomer,NoBilling',
            'FirstDate' => 'required|date',
            'EndDate' => 'required|date',
        ]);

        try {
            $kontrak = Kontrak::findOrFail($Id);
            $kontrak->update($request->all());
            return redirect()->route('admin.kontrak.index')->with('success', 'Data Kontrak berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy(Kontrak $Id)
    {
        try {
            $Id->delete();
            return redirect()->route('admin.kontrak.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }

}
