@extends('layout/admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      <div class="row mb-3">
        <div class="col-lg-6">
          <h3 class="text-uppercase">ubah data profesi</h3>
        </div>
        <div class="col-lg-6 text-end">
          <a href="{{url()->previous()}}" class="text-decoration-none text-danger">
            <i class="bi bi-arrow-left me-1"></i>kembali
          </a>
        </div>
      </div>
      <div class="row mb-3 justify-content-center">
        <div class="col-lg-8">
          <form action="/admin/data_profesi/{{$data->uri}}" method="post">
          @method('PUT')
          @csrf
          <div class="mb-3">
            <label for="profesi" class="form-label">Nama Profesi</label>
            <input type="text" value="{{$data->profesi}}" class="form-control @error('profesi') is-invalid @enderror" id="profesi" name="profesi" placeholder="Agama">
            @error('profesi')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Data</label>
            <input type="number" value="{{$data->jumlah}}" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="1">
            @error('jumlah')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <button class="btn w-100 text-light" style="background-color: #a47148" type="submit"><i class="bi bi-cloud me-2"></i>Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
@endsection