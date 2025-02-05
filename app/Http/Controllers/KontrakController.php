<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Customer;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    //FUNGSI UNTUK MENAMPILKAN DATA KONTRAK
    public function index()
    {
       $kontrak = Kontrak::with('datacustomer')->get();
       return view('admin.kontrak.index', ['kontrak'=>$kontrak]);
    }

    //FUNGSI MENGALIHKAN KE HALAMAN TAMBAH DATA DENGAN MENGAMBIL DATA NOBILLING DARI TABEL DATACUSTOMER
    public function create()
    {
        $NoBilling  = Customer::all();
        return view('admin.kontrak.create', compact('NoBilling'));
    }

    //FUNGSI UNTUK MENYIMPAN DATA YANG DIINPUTKAN PADA HALAMAN TAMBAH DATA
    public function store(Request $request)
    {
        try {
            $request->validate([
                'NoKontrak' => 'required|string|max:50',
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

    //FUNGSI UNTUK MENGALIHKAN KE HALAMAN EDIT DATA DENGAN MENGAMBIL DATA KONTRAK DAN NOBILLING BERDASARKAN ID
    public function edit($Id)
    {
        $kontrak = Kontrak::findOrFail($Id);
        $NoBilling  = Customer::all();
        return view('admin.kontrak.edit', compact('kontrak', 'NoBilling'));
    }  

    //FUNGSI UNTUK MENGUPDATE DATA KONTRAK BERDASARKAN ID
    public function update(Request $request, $Id)
    {        
        $request->validate([
           'NoKontrak' => 'required|string|max:50',
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

    //FUNGSI UNTUK MENGHAPUS DATA KONTRAK BERDASARKAN ID
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
