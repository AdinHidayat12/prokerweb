@extends('layout/public')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      <div class="row">
        <h4 class="text-center"><i class="bx bx-building-house me-1"></i> Sarana dan Prasarana Desa</h4>
        <hr>
      </div>
      <div class="row justify-content-center">
        @foreach ($data as $item)
        <div class="card m-2" style="max-width: 13rem;">
          <img src="@if($item->gambar) {{asset('storage/'.$item->gambar)}} @else https://source.unsplash.com/1600x900/?{{$item->sarana}} @endif" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">{{$item->sarana.' sebanyak '.$item->jumlah.' '.$item->satuan}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection