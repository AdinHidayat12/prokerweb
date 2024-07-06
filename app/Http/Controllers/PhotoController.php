<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
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
        return view('admin/profil/foto/create', [
            'title' => 'Foto Desa',
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
            'gambar' => 'required|image|file|max:4000',
            'judul' => 'required|string'
        ]);
        $data['gambar'] = $request->file('gambar')->store('foto');
        $data['uri'] = Str::random(30);
        Photo::create($data);
        return redirect('/admin/profil_desa')->with('photo_created', 'Foto berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $foto)
    {
        return view('admin/profil/foto/edit', [
            'title' => 'Ubah Foto',
            'data' => $foto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $foto)
    {
        $data = $request->validate([
            'gambar' => 'image|file|max:4000',
            'judul' => 'required|string'
        ]);
        if ($request->hasFile('gambar')) { 
            Storage::delete($foto->gambar);
            $data['gambar'] = $request->file('gambar')->store('foto');
        }
        Photo::where('id', $foto->id)->update($data);
        return redirect('/admin/profil_desa')->with('photo_edited', 'Foto berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $foto)
    {
        Storage::delete($foto->gambar);
        Photo::destroy($foto->id);
        return redirect('/admin/profil_desa')->with('photo_deleted', 'Foto berhasil dihapus');
    }
}
