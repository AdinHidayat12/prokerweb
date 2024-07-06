@extends('layout/admin')

@section('content')
    <div class="container shadow card mt-3 mb-3 p-3">
      <div class="row mb-3">
        <div class="col-lg-6">
          <h3 class="text-uppercase">Ubah Foto</h3>
        </div>
        <div class="col-lg-6 text-end">
          <a href="{{url()->previous()}}" class="text-danger text-decoration-none"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
        </div>
      </div>
      <div class="row mb-3 justify-content-center">
        <div class="col-lg-8">
          <form action="/admin/foto/{{$data->uri}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="judul" class="form-label">Judul Foto</label>
              <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{$data->judul}}">
              @error('judul')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Foto</label>
              <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar">
              @error('gambar')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <button type="submit" class="btn w-100 text-light" style="background-color: #a47148"><i class="bi bi-cloud me-1"></i>Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection