<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Manager;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $datacustomer = Customer::with('accountManager')->get();
        
        return view('admin.customer.index', ['datacustomer'=>$datacustomer]);
    }

     public function create()
    {
        $nikamOptions = Manager::all(); 
        return view('admin.customer.create', compact('nikamOptions'));
    }

    public function store(Request $request)//
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

    public function edit($NoBilling)
    {
        $datacustomer = Customer::findOrFail($NoBilling);
        $nikamOptions = Manager::all();
        return view('admin.customer.edit', compact('datacustomer', 'nikamOptions'));
    }

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
