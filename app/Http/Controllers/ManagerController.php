<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Segmen;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
       $accountmanager = Manager::with('segmen')->get();
       return view('admin.manager.index', ['accountmanager'=>$accountmanager]);
    }

    public function create()
    {
        $segmen = Segmen::all();
        return view('admin.manager.create', compact('segmen'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'NIKAM' => 'required|unique:accountmanager,NIKAM',
                'NamaAM' => 'required',
                'IdSegmen' => 'required|exists:segmen,IdSegmen',
                'NoHP' => 'required',
                'Email' => 'required|email',
                'IdTelegram' => 'required',
            ]);

            Manager::create($request->all());

            return redirect()->route('admin.manager.index')->with('success', 'Data Manager berhasil ditambahkan.');
        } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit($NIKAM)
    {
        $accountmanager = Manager::findOrFail($NIKAM);
        return view('admin.manager.edit', compact('accountmanager'));
    }   

    public function update(Request $request, $NIKAM)
    {
        try {
            $request->validate([
                'NamaAM' => 'required|string|max:255',
                'NoHP' => 'required|string|max:255',
                'Email' => 'required|email|max:255',
                'IdTelegram' => 'required|string|max:255',
            ]);

            $accountmanager = Manager::findOrFail($NIKAM);
            $accountmanager->update($request->all());
            return redirect()->route('admin.manager.index')->with('success', 'Data manager berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

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
