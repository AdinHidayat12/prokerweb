@extends('layout.public')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      <div class="row mb-3 text-center justify-content-center">
        <h4 class="text-uppercase"><i class="bx bx-group me-1"></i>{{$data->nama}}</h4>
        <hr>
        <div class="col-lg-8">
          {!!$data->keterangan!!}
        </div>
      </div>
    </div>
@endsection