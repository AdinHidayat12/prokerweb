<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeneralController extends Controller
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
        return view('admin/data_desa/umum/create', [
            'title' => 'Data umum desa'
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
            'kategori' => 'required|min:4|max:30',
            'spesifik' => 'required|min:4|max:30',
            'jumlah' => 'required|gt:0'
        ]);
        $data['uri'] = Str::random(35);
        General::create($data);
        return redirect('/admin/data_desa')->with('general_created', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit(General $data_umum)
    {
        return view('admin/data_desa/umum/edit', [
            'title' => 'Ubah data',
            'data' => $data_umum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, General $data_umum)
    {
        $data = $request->validate([
            'kategori' => 'required|min:4|max:30',
            'spesifik' => 'required|min:4|max:30',
            'jumlah' => 'required|gt:0'
        ]);
        General::where('id', $data_umum->id)->update($data);
        return redirect('/admin/data_desa')->with('general_updated', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function destroy(General $data_umum)
    {
        General::destroy($data_umum->id);
        return redirect('/admin/data_desa')->with('general_deleted', 'Data berhasil dihapus');
    }
}
