@extends('layout.admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      <div class="row mb-3">
        <div class="col-lg-6">
          <h3 class="text-uppercase">
            ubah sarana & prasarana
          </h3>
        </div>
        <div class="col-lg-6 text-end">
          <a href="{{url()->previous()}}" class="text-decoration-none text-danger"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
        </div>
      </div>
      <div class="row mb-3 justify-content-center">
        <div class="col-lg-10">
          <form action="/admin/infrastruktur/{{$data->uri}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="sarana" class="form-label">Sarana</label>
              <input type="text" class="form-control @error('sarana') is-invalid @enderror" name="sarana" placeholder="Balai desa" value="{{$data->sarana}}">
              @error('sarana')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah sarana</label>
              <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{$data->jumlah}}">
              @error('jumlah')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="satuan" class="form-label">Satuan jumlah</label>
              <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" placeholder="unit" value="{{$data->satuan}}">
              @error('satuan')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar sarana</label>
              <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar">
              @error('gambar')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <button class="btn text-white w-100" style="background-color: #a47148">
                <i class="bi bi-cloud me-2"></i>Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection