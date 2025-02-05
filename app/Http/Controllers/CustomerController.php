<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Manager;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //FUNGSI UNTUK MENAMPILKAN DATA CUSTOMER
    public function index()
    {
        $datacustomer = Customer::with('accountManager')->get();
        
        return view('admin.customer.index', ['datacustomer'=>$datacustomer]);
    }
    
    //FUNGSI MENGALIHKAN KE HALAMAN TAMBAH DATA DENGAN MENGAMBIL DATA NIKAM DARI TABEL ACCOUNT MANAGER
    public function create()
    {
        $nikamOptions = Manager::all(); 
        return view('admin.customer.create', compact('nikamOptions'));
    }

    //FUNGSI UNTUK MENYIMPAN DATA YANG DIINPUTKAN PADA HALAMAN TAMBAH DATA
    public function store(Request $request)
    {
        try {        
            $request->validate([
            'NamaCust' => 'required|string|max:255',
            'NoBilling' => 'required|unique:datacustomer,NoBilling',
            'NIPNAS' => 'required|numeric',
            'AlamatCust' => 'required|string|max:255',
            'NamaPIC' => 'required|string|max:255',
            'NoHPPIC' => 'required|string|max:255',
            'NIKAM' => 'required|exists:accountmanager,NIKAM', 
            'EmailCust' => 'required|email|string|max:55',
             ]);

        Customer::create($request->all());

        return redirect()->route('admin.customer.index')->with('success', 'Data Customer berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: '.$e->getMessage());
        }
    }

    //FUNGSI UNTUK MENGALIHKAN KE HALAMAN EDIT DATA DENGAN MENGAMBIL DATA CUSTOMER DAN NIKAM BERDASARKAN NOBILLING
    public function edit($NoBilling)
    {
        $datacustomer = Customer::findOrFail($NoBilling);
        $nikamOptions = Manager::all();
        return view('admin.customer.edit', compact('datacustomer', 'nikamOptions'));
    }

    //FUNGSI UNTUK MENGUPDATE DATA CUSTOMER BERDASARKAN NOBILLING
    public function update(Request $request, $NoBilling)
    {
        try {
            $request->validate([
                'NamaCust' => 'required|string|max:255',
                'NIPNAS' => 'required|numeric',
                'AlamatCust' => 'required|string|max:255',
                'NamaPIC' => 'required|string|max:255',
                'NoHPPIC' => 'required|string|max:15',
                'NIKAM' => 'required|exists:accountmanager,NIKAM', 
                'EmailCust' => 'required|email|string|max:55',
            ]);
            
            $customer = Customer::findOrFail($NoBilling);
            $customer->update($request->all());
            return redirect()->route('admin.customer.index')->with('success', 'Data Customer berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data. '.$e->getMessage());
        }
    }

    //FUNGSI UNTUK MENGHAPUS DATA CUSTOMER BERDASARKAN NOBILLING
    public function destroy(Customer $NoBilling)
    {
        try {
            $NoBilling->delete();
            return redirect()->route('admin.customer.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }
}
