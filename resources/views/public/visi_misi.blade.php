@extends('layout/public')

@section('content')
    <div class="container p-3">
      <div class="row mb-3">
        <div class="card text-center">
          <div class="card-header">
            Visi & Misi Desa
          </div>
          <div class="card-body">
            <h5 class="card-title">Visi Desa</h5>
            <p class="card-text">{{$data[0]->visi}}</p>
          </div>
          <div class="card-footer text-muted">
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="card text-center">
          <div class="card-header">
            Visi & Misi Desa
          </div>
          <div class="card-body">
            <h5 class="card-title">Misi Desa</h5>
            <p class="card-text">{!!$data[0]->misi!!}</p>
          </div>
          <div class="card-footer text-muted">
          </div>
        </div>
      </div>
    </div>
@endsection