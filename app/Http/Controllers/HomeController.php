<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Vision;
use App\Models\Official;
use App\Models\Council;
use App\Models\Photo;
use App\Models\Profile;
use App\Models\Infrastructure;
use App\Models\Union;
use App\Models\Profession;
use App\Models\General;

class HomeController extends Controller
{
    public function index(){
        return view('public/home', [
            'title' => 'Desa Ringin Putih',
            'artikel' => Article::latest()->take(3)->get(),
            'foto' => Photo::latest()->get(),
            'lembaga' => Union::all(),
            'visi' => Vision::all(),
            'kades' => Official::firstWhere('jabatan', 'Kepala Desa'),
            'sekdes' => Official::firstWhere('jabatan', 'Sekretaris Desa'),
            'bendes' => Official::firstWhere('jabatan', 'Kaur Keuangan'),
        ]);
    }

    public function show_artikel(Article $artikel){
        return view('public/article', [
            'title' => $artikel->judul,
            'artikel' => $artikel,
            'lembaga' => Union::all()
        ]);
    }

    public function list_artikel(){
        return view('public/articles', [
            'title' => 'Berita Terkini',
            'artikel' => Article::latest()->get(),
            'lembaga' => Union::all()
        ]);
    }

    public function show_visi_misi(){
        return view('public/visi_misi', [
            'title' => 'Visi & Misi',
            'data' => Vision::where('id', 1)->get(),
            'lembaga' => Union::all()
        ]);
    }

    public function show_struktur(){
        return view('public/struktur', [
            'title' => 'Struktur Pemerintahan',
            'data' => Official::all(),
            'lembaga' => Union::all()
        ]);
    }

    public function show_bpd(){
        return view('public/bpd', [
            'title' => 'Badan Permusyawaratan Desa',
            'data' => Council::all(),
            'lembaga' => Union::all()
        ]);
    }

    public function show_geografi(){
        return view('public/geografi', [
            'title' => 'Kondisi Geografis dan Ekonomi',
            'data' => Profile::all(),
            'lembaga' => Union::all()
        ]);
    }

    public function show_sarana(){
        return view('public/sarana', [
            'title' => 'Sarana dan Prasarana',
            'data' => Infrastructure::all(),
            'lembaga' => Union::all()
        ]);
    }

    public function show_lembaga(Union $lembaga){
        return view('public/lembaga', [
            'title' => $lembaga->nama,
            'data' => $lembaga,
            'lembaga' => Union::all()
        ]);
    }

    public function show_data(){
        return view('public/data_desa', [
            'title' => 'Data Desa',
            'data_umum' => General::orderBy('kategori', 'asc')->get(),
            'data_profesi' => Profession::all(),
            'lembaga' => Union::all()
        ]);
    }
}
