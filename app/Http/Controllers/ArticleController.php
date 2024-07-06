<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Article::latest();
        return view('admin/artikel/list', [
            'title' => 'Artikel',
            'data' => $artikel->filter(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/artikel/create', [
            'title' => 'Artikel',
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
            'judul' => 'required|min:4|max:50',
            'gambar' => 'image|file|max:4096',
            'teks' => 'required|min:10|max:500'
        ]);
        if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('gambar_artikel');
        }
        $data['preview'] = Str::limit(strip_tags($request['teks']), 30, '...');
        $data['uri'] = Str::random(40);
        Article::create($data);
        return redirect('/admin/article')->with('article_created', 'Berhasil menambahkan artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin/artikel/detail', [
            'title' => 'Artikel',
            'data' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin/artikel/edit', [
            'title' => 'Artikel',
            'data' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'judul' => 'required|min:4|max:50',
            'gambar' => 'image|file|max:4096',
            'teks' => 'required|min:10|max:500'
        ]);
        if ($request->hasFile('gambar')) {
            if($article->gambar != null){
                Storage::delete($article->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar_artikel');
        }
        $data['preview'] = Str::limit(strip_tags($request['teks']), 30, '...');
        Article::where('id', $article->id)->update($data);
        return redirect('/admin/article')->with('article_edited', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::delete($article->gambar);
        Article::destroy($article->id);
        return redirect('/admin/article')->with('article_deleted', 'Artikel berhasil dihapus');
    }
}
