<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\provinsi;
use App\Models\kabupaten;

class ProvinsiController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsis = provinsi::all();
        return view('provinsi.index', compact('provinsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // validation
        $provinsi = $request->validate([
            'nama_provinsi' => 'required|min:3'
        ]);

        provinsi::create($provinsi);

        return redirect(route('provinsi.index'))->with('success', 'provinsi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $provinsi = provinsi::find($id);
        $kabupatens = kabupaten::where('provinsi_id', $id)->get();
        return view('provinsi.filter', compact('kabupatens', 'provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $provinsi = provinsi::find($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $provinsi = $request->validate([
            'nama_provinsi' => 'required|min:3'
        ]);

        provinsi::find($id)->update($provinsi);
        return redirect(route('provinsi.index'))->with('success', 'provinsi berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        provinsi::destroy($id);
        return redirect(route('provinsi.index'))->with('success', 'provinsi berhasil Dihapus');
    }
}
