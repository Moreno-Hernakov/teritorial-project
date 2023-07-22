<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kabupaten;
use App\Models\provinsi;

class KabupatenController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabupatens = kabupaten::all();
        return view('kabupaten.index', compact('kabupatens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsis = provinsi::all();
        return view('kabupaten.create', compact('provinsis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $kabupaten = $request->validate([
            'nama_kabupaten' => 'required|min:3',
            'provinsi_id' => 'required',
            'jumlah_penduduk' => 'required|integer'
        ]);

        // find provinsi by provinsi_id
        $provinsi = provinsi::find($request->provinsi_id);

        // sum request jumlah penduduk to table provinsi coloumn penduduk
        provinsi::find($request->provinsi_id)->update([
            'jumlah_penduduk' => $provinsi->jumlah_penduduk += $request->jumlah_penduduk
        ]);

        // add request kabupaten to table kabupaten
        kabupaten::create($kabupaten);

        return redirect(route('kabupaten.index'))->with('success', 'kabupaten berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kabupatens = kabupaten::all();
        return view('kabupaten.index', compact('kabupatens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find kabupaten by id
        $kabupaten = kabupaten::find($id);

        // find provinsi by provinsi_id
        $provinsi = provinsi::find($kabupaten->provinsi_id);

        // sum kabupten jumlah_penduduk and provinsi jumlah_penduduk to table provinsi coloumn jumlah_penduduk
        $provinsi->update([
            'jumlah_penduduk' => $provinsi->jumlah_penduduk -= $kabupaten->jumlah_penduduk
        ]);

        // delete kabupaten
        $kabupaten->delete();
        
        return redirect(route('kabupaten.index'))->with('success', 'kabupaten berhasil Dihapus');
    }
}
