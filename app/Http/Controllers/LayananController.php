<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Customer;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
       $layanan = Layanan::all();
       return view('admin.layanan.index', ['layanan'=>$layanan]);
    }

    public function create()
    {
        $NoBilling  = Customer::all();
        return view('admin.layanan.create', compact('NoBilling'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NoBilling' => 'required|exists:datacustomer,NoBilling',
            'SID' => 'required|exists|unique:layanan,SID',
            'ProdName' => 'required|string|max:255',
            'Bandwidth' => 'required|numeric',
            'Satuan' => 'required|string|max:50',
            'NilaiLayanan' => 'required|numeric',
        ]);

        Layanan::create($request->all());

        return redirect()->route('admin.layanan.index')->with('success', 'Data layanan berhasil ditambahkan.');
    }
    
    public function edit($SID)
    {
        $layanan = Layanan::findOrFail($SID);
        $NoBilling  = Customer::all();
        return view('admin.layanan.edit', compact('layanan', 'NoBilling'));
    }  

    public function update(Request $request, $SID)
    {
        $request->validate([
            'NoBilling' => 'required|exists:datacustomer,NoBilling',
            'ProdName' => 'required|string|max:255',
            'Bandwidth' => 'required|numeric',
            'Satuan' => 'required|string|max:50',
            'NilaiLayanan' => 'required|numeric',
        ]);

        try {
            $layanan = Layanan::findOrFail($SID);
            $layanan->update($request->all());
            return redirect()->route('admin.layanan.index')->with('success', 'Data Layanan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
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
