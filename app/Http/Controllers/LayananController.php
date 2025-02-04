<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Customer;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
       $layanan = Layanan::with('datacustomer')->get();
       return view('admin.layanan.index', ['layanan'=>$layanan]);
    }

    public function create()
    {
        $NoBilling  = Customer::all();
        return view('admin.layanan.create', compact('NoBilling'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'NoBilling' => 'required|exists:datacustomer,NoBilling', 
                'SID' => 'required|unique:layanan,SID',
                'ProdName' => 'required|string|max:100',
                'Bandwidth' => 'required|string|max:10',
                'Satuan' => 'required|string|max:10',
                'Jumlah' => 'required|numeric',
                'NilaiLayanan' => 'required|numeric|min:0',
                'Deskripsi' => 'required|string|max:100',
            ]);

            $layanan = Layanan::create($validatedData);

            return redirect()->route('admin.layanan.index')->with('success', 'Data layanan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
    
    public function edit($SID)
    {
        $layanan = Layanan::findOrFail($SID);
        $NoBilling  = Customer::all();
        return view('admin.layanan.edit', compact('layanan', 'NoBilling'));
    }  

    public function update(Request $request, $SID)
    {
        try {
            $request->validate([
                'NoBilling' => 'required|exists:datacustomer,NoBilling',
                'ProdName' => 'required|string|max:100',
                'Bandwidth' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        if ($request->Satuan === 'MBPS' && !is_numeric($value)) {
                            $fail('Kolom Bandwidth harus berupa angka jika satuan adalah MBPS.');
                        }
                        if ($request->Satuan !== 'MBPS' && $value !== '-') {
                            $fail('Kolom Bandwidth harus berisi "-" jika satuan bukan MBPS.');
                        }
                    },
                ],
                'Satuan' => 'required|string|max:10',
                'Jumlah' => 'required|numeric',
                'NilaiLayanan' => 'required|numeric|min:0',
                'Deskripsi' => 'required|string|max:100',
            ]);

            $layanan = Layanan::findOrFail($SID);
            $layanan->update($request->all());
            return redirect()->route('admin.layanan.index')->with('success', 'Data Layanan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Layanan $SID)
    {
        try {
            $SID->delete();
            return redirect()->route('admin.layanan.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }

}
