@extends('layout/public')

@section('content')
    <div class="container p-3">
      <h3 class="text-uppercase text-center mb-3">{{$artikel->judul}}</h3>
      <div class="text-center mb-3" style="width: 100%;">
        <img src="@if($artikel->gambar) {{asset('storage/'.$artikel->gambar)}} @else https://source.unsplash.com/700x400/?{{$artikel->judul}} @endif" alt="" class="img-fluid" style="object-fit:contain; width:100%; height: 400px">
      </div>
      <div class="p-3">
        {!! $artikel->teks !!}
      </div>
    </div>
@endsection