@extends('layout/admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      <div class="row mb-3">
        <div class="col-lg-4">
          <h4 class="text-uppercase">perbarui lembaga</h4>
        </div>
        <div class="col-lg-8 text-end">
          <a href="{{url()->previous()}}" class="text-decoration-none text-danger"><i class="bi bi-arrow-left ms-2"></i> Kembali</a>
        </div>
      </div>
      <div class="row mb-3 justify-content-center">
        <div class="col-lg-10">
          <form action="/admin/kelembagaan/{{$data->uri}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lembaga</label>
              <input value="{{$data->nama}}" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama">
              @error('nama')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="x" class="form-label">Keterangan</label>
              @error('keterangan')
                  <p class="text-danger">{{$message}}</p>
              @enderror
              <input id="x" type="hidden" name="keterangan" value="{{$data->keterangan}}">
              <trix-editor input="x"></trix-editor>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn text-white w-100" style="background-color: #a47148"><i class="bi bi-cloud-fill me-2"></i>Simpan perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display:none;
      }
    </style>
    <script>
      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      });
    </script>
@endsection