<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vision;
use App\Models\Official;
use App\Models\Council;
use App\Models\Profile;
use App\Models\Infrastructure;
use App\Models\Photo;
use App\Models\General;
use App\Models\Profession;

class GovController extends Controller
{
    public function index(){
        return view('admin/pemerintahan/index', [
            'title' => 'Pemerintahan',
            'data' => Vision::all(),
            'pegawai' => Official::all(),
            'bpd' => Council::all()
        ]);
    }

    public function ubah_visi(Request $request){
        $data = $request->validate([
            'visi' => 'required|min:20',
            'misi' => 'required|min:20',
        ]);
        Vision::where('id', 1)->update($data);
        return redirect('/admin/pemerintahan')->with('visi_edited', 'Visi dan misi desa berhasil diubah');
    }

    public function show_profil(){
        return view('admin/profil/index', [
            'title' => 'Profil Desa',
            'data' => Profile::all(),
            'infrastruktur' => Infrastructure::all(),
            'foto' => Photo::all()
        ]);
    }

    public function ubah_geografis(Request $request){
        $data = $request->validate([
            'geografis' => 'required|min:10',
        ]);
        Profile::where('id', 1)->update($data);
        return redirect('/admin/profil_desa')->with('geo_edited', 'Keterangan geografis desa berhasil diubah');
    }

    public function ubah_ekonomi(Request $request){
        $data = $request->validate([
            'ekonomi' => 'required|min:10',
        ]);
        Profile::where('id', 1)->update($data);
        return redirect('/admin/profil_desa')->with('ekonomi_edited', 'Keterangan ekonomi desa berhasil diubah');
    }

    public function show_data(){
        return view('admin/data_desa/index', [
            'title' => 'Data Desa',
            'data_profesi' => Profession::all(),
            'data_umum' => General::all()
        ]);
    }
}
