<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index(){
        return view('admin/dashboard', [
            'title' => 'Beranda',
            'artikel' => count(Article::all()),
        ]);
    }
}
