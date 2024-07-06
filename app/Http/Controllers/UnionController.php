<?php

namespace App\Http\Controllers;

use App\Models\Union;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/kelembagaan/list', [
            'title' => 'Kelembagaan',
            'lembaga' => Union::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/kelembagaan/create', [
            'title' => 'Kelembagaan Desa',
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
            'keterangan' => 'required'
        ]);
        $data['uri'] = Str::random(40);
        Union::create($data);
        return redirect('/admin/kelembagaan')->with('union_created', 'Lembaga berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function show(Union $kelembagaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function edit(Union $kelembagaan)
    {
        return view('admin/kelembagaan/edit', [
            'title' => 'Kelembagaan Desa',
            'data' => $kelembagaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Union $kelembagaan)
    {
        $data = $request->validate([
            'nama' => 'required|min:5|max:50',
            'keterangan' => 'required'
        ]);

        Union::where('id', $kelembagaan->id)->update($data);
        return redirect('/admin/kelembagaan')->with('union_updated', 'Lembaga berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function destroy(Union $kelembagaan)
    {
        Union::destroy($kelembagaan->id);
        return redirect('/admin/kelembagaan')->with('union_deleted', 'Lembaga berhasil dihapus');
    }
}
