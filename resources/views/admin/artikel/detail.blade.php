@extends('layout/admin')

@section('content')
    <div class="container p-3">
      <div class="row text-end">
        <p><a href="{{url()->previous()}}" class="text-decoration-none text-danger"><i class="bi bi-arrow-left"></i> kembali</a></p>
      </div>
      <h3 class="text-uppercase text-center mb-3">{{$data->judul}}</h3>
      <div class="text-center mb-3" style="width: 100%;">
        <img src="@if($data->gambar) {{asset('storage/'.$data->gambar)}} @else https://source.unsplash.com/700x400/?{{$data->judul}} @endif" alt="" class="img-fluid" style="object-fit:contain; width:100%; height: 400px">
      </div>
      <div class="p-3">
        {!! $data->teks !!}
      </div>
    </div>
@endsection