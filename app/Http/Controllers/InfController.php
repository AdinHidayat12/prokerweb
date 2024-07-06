<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/profil/infrastruktur/create', [
            'title' => 'Tambah sarana desa',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'sarana' => 'required|string',
            'jumlah' => 'required|min:1',
            'satuan' => 'required|string',
            'gambar' => 'image|file|max:4000'
        ]);
        if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('gambar_sarana');
        }
        $data['uri'] = Str::random(30);
        Infrastructure::create($data);
        return redirect('/admin/profil_desa')->with('inf_created', 'Sarana dan prasarana berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function show(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function edit(Infrastructure $infrastruktur)
    {
        return view('admin/profil/infrastruktur/edit', [
            'title' => 'Ubah sarana dan prasarana',
            'data' => $infrastruktur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infrastructure $infrastruktur)
    {
        $data = $request->validate([
            'sarana' => 'required|string',
            'jumlah' => 'required|min:1',
            'satuan' => 'required|string',
            'gambar' => 'image|file|max:4000'
        ]);
        if ($request->hasFile('gambar')) {
            if($infrastruktur->gambar != null){
                Storage::delete($infrastruktur->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar_sarana');
        }
        Infrastructure::where('id', $infrastruktur->id)->update($data);
        return redirect('/admin/profil_desa')->with('inf_updated', 'Sarana dan prasarana berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infrastructure $infrastruktur)
    {
        Storage::delete($infrastruktur);
        Infrastructure::destroy($infrastruktur->id);
        return redirect('/admin/profil_desa')->with('inf_deleted', 'Sarana dan prasarana berhasil dihapus');
    }
}
