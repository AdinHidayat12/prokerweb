@extends('layout/public')

@section('content')
    <div class="container p-3">
      <div class="row justify-content-center">
        <h4 class="text-center text-uppercase">pemerintahan desa</h4>
        <hr>
        @foreach ($data as $item)
            <div class="col-lg-5">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="@if ($item->gambar === NULL) @if($item->jenis_kelamin == 'L') /images/pria.png @else /images/wanita.png @endif @else {{asset('storage/'.$item->gambar)}}  @endif" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$item->nama}}</h5>
                      <p class="card-text">{{$item->jabatan}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
@endsection