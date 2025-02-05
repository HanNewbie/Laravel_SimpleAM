<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Segmen;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //FUNGSI UNTUK MENAMPILKAN DATA MANAGER
    public function index()
    {
       $accountmanager = Manager::with('segmen')->get();
       return view('admin.manager.index', ['accountmanager'=>$accountmanager]);
    }

    //FUNGSI MENGALIHKAN KE HALAMAN TAMBAH DATA DENGAN MENGAMBIL DATA IDSEGEMEN DARI TABEL SEGEMEN
    public function create()
    {
        $segmen = Segmen::all();
        return view('admin.manager.create', compact('segmen'));
    }

    //FUNGSI UNTUK MENYIMPAN DATA YANG DIINPUTKAN PADA HALAMAN TAMBAH DATA
    public function store(Request $request)
    {
        try {
            $request->validate([
                'NIKAM' => 'required|unique:accountmanager,NIKAM',
                'NamaAM' => 'required|string|max:255',
                'IdSegmen' => 'required|exists:segmen,IdSegmen',
                'NoHP' => 'required|string|max:13',
                'Email' => 'required|email|string|max:55',
                'IdTelegram' => 'required|string|max:55',
            ]); 

            Manager::create($request->all());

            return redirect()->route('admin.manager.index')->with('success', 'Data Manager berhasil ditambahkan.');
        } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    //FUNGSI UNTUK MENGALIHKAN KE HALAMAN EDIT DATA DENGAN MENGAMBIL DATA MANAGER BERDASARKAN NIKAM
    public function edit($NIKAM)
    {
        $accountmanager = Manager::findOrFail($NIKAM);
        return view('admin.manager.edit', compact('accountmanager'));
    }   

    //FUNGSI UNTUK MENGUPDATE DATA MANAGER BERDASARKAN NIKAM
    public function update(Request $request, $NIKAM)
    {
        try {
            $request->validate([
                'NamaAM' => 'required|string|max:255',
                'NoHP' => 'required|string|max:13',
                'Email' => 'required|email|string|max:55',
                'IdTelegram' => 'required|string|max:55',
            ]);

            $accountmanager = Manager::findOrFail($NIKAM);
            $accountmanager->update($request->all());
            return redirect()->route('admin.manager.index')->with('success', 'Data manager berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    //FUNGSI UNTUK MENGHAPUS DATA MANAGER BERDASARKAN NIKAM
    public function destroy(Manager $NIKAM)
    {
        try {
            $NIKAM->delete();
            return redirect()->route('admin.manager.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }
}
