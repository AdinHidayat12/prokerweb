<?php

namespace App\Http\Controllers;

use App\Models\Council;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CouncilController extends Controller
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
        return view('admin/pemerintahan/bpd/create', [
            'title' => 'Pemerintahan Desa',
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
            'nama' => 'required|min:4|max:50',
            'gambar' => 'image|file|max:2048',
            'jenis_kelamin' => 'required|max:1',
            'jabatan' => 'required|string'
        ]);
        if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('badan_permusyawaratan_desa');
        }
        $data['uri'] = Str::random(30);
        Council::create($data);
        return redirect('/admin/pemerintahan')->with('councils_created', 'Anggota BPD berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Council  $bpd
     * @return \Illuminate\Http\Response
     */
    public function show(Council $bpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Council  $bpd
     * @return \Illuminate\Http\Response
     */
    public function edit(Council $bpd)
    {
        return view('admin/pemerintahan/bpd/edit', [
            'title' => $bpd->nama,
            'data' => $bpd
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Council  $bpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Council $bpd)
    {
        $data = $request->validate([
            'nama' => 'required|min:4|max:50',
            'gambar' => 'image|file|max:2048',
            'jenis_kelamin' => 'required|max:1',
            'jabatan' => 'required|string'
        ]);
        if ($request->hasFile('gambar')) {
            if($bpd->gambar != null){
                Storage::delete($bpd->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('badan_permusyawaratan_desa');
        }
        Council::where('id', $bpd->id)->update($data);
        return redirect('/admin/pemerintahan')->with('councils_updated', 'Anggota BPD berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Council  $bpd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Council $bpd)
    {
        Storage::delete($bpd->gambar);
        Council::destroy($bpd->id);
        return redirect('/admin/pemerintahan')->with('councils_deleted', 'Anggota BPD berhasil dihapus');
    }
}
