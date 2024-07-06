@extends('layout/admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      @if (session()->has('general_created'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('general_created')}}
          </div>            
        @endif
        @if (session()->has('general_updated'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('general_updated')}}
          </div>            
        @endif
        @if (session()->has('general_deleted'))
          <div class="alert alert-warning" role="alert">
            <i class="bi bi-check me-2"></i>{{session('general_deleted')}}
          </div>            
        @endif
        @if (session()->has('profession_created'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('profession_created')}}
          </div>            
        @endif
        @if (session()->has('profession_updated'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('profession_updated')}}
          </div>            
        @endif
        @if (session()->has('profession_deleted'))
          <div class="alert alert-warning" role="alert">
            <i class="bi bi-check me-2"></i>{{session('profession_deleted')}}
          </div>            
        @endif
      @if (!count($data_profesi))
        <div class="row justify-content-center mb-3">
          <div class="col-lg-6 text-center">
            <img src="/images/pns-min.jpg" alt="" class="img-fluid" style="width: 30%">
            <h4>Ups! Tidak ada data profesi</h4>
            <a href="/admin/data_profesi/create" class="btn text-light" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah Data Profesi</a>
          </div>
        </div>
      @else
        <div class="row mb-3">
          <div class="col-lg-6">
            <h5 class="text-uppercase">data berdasarkan profesi</h5>
          </div>
          <div class="col-lg-6 text-end">
            <a href="/admin/data_profesi/create" class="btn text-light" style="background-color: #a47148"><i class="bi bi-plus me-1"></i>Tambah</a>
          </div>
        </div>
        <div class="row mb-3 justify-content-center">
          <div class="col-lg-10">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Profesi</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              @foreach ($data_profesi as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->profesi}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td>
                      <a href="/admin/data_profesi/{{$item->uri}}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pen me-1"></i>Ubah</a>
                      <form action="/admin/data_profesi/{{$item->uri}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash me-1"></i>Hapus</button>
                      </form>
                    </td>
                  </tr>
              @endforeach
            </table>
          </div>
        </div>  
      @endif
      <hr>
      @if (!count($data_umum))
      <div class="row justify-content-center mb-3">
        <div class="col-lg-6 text-center">
          <img src="/images/pns-min.jpg" alt="" class="img-fluid" style="width: 30%">
          <h4>Ups! Tidak ada data warga</h4>
          <a href="/admin/data_umum/create" class="btn text-light" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah data warga</a>
        </div>
      </div>
      @else
      <div class="row mb-3">
        <div class="col-lg-6">
          <h5 class="text-uppercase">
            Jumlah warga 
          </h5>
        </div>
        <div class="col-lg-6 text-end">
          <a href="/admin/data_umum/create" class="btn text-light" style="background-color: #a47148"><i class="bi bi-plus me-1"></i>Tambah</a>
        </div>
      </div>
      <div class="row mb-3 justify-content-center">
        <div class="col-lg-10">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kategori</th>
                <th>Spesifikasi</th>
                <th>Jumlah</th>
                <th></th>
              </tr>
            </thead>
            @foreach ($data_umum as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->kategori}}</td>
                  <td>{{$item->spesifik}}</td>
                  <td>{{$item->jumlah}}</td>
                  <td>
                    <a href="/admin/data_umum/{{$item->uri}}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pen me-1"></i>Ubah</a>
                    <form action="/admin/data_umum/{{$item->uri}}" method="post" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash me-1"></i>Hapus</button>
                    </form>
                  </td>
                </tr>
            @endforeach
          </table>
        </div>
      </div>
      @endif
    </div>
@endsection