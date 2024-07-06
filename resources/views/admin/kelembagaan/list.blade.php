@extends('layout/admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      @if (session()->has('union_created'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('union_created')}}
          </div>            
        @endif
        @if (session()->has('union_updated'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('union_updated')}}
          </div>            
        @endif
        @if (session()->has('union_deleted'))
          <div class="alert alert-warning" role="alert">
            <i class="bi bi-check me-2"></i>{{session('union_deleted')}}
          </div>            
        @endif
      @if (!count($lembaga))
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <img src="/images/pns-min.jpg" alt="" class="img-fluid" style="width: 30%">
            <h4>Ups! Tidak ada data</h4>
            <a href="/admin/kelembagaan/create" class="btn text-light" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah</a>
          </div>
        </div>
      @else
        <div class="row mb-3">
          <div class="col-lg-6">
            <h3 class="text-uppercase">Daftar kelembagaan</h3>
          </div>
          <div class="col-lg-6 text-end">
            <a href="/admin/kelembagaan/create" class="btn text-light" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah</a>
          </div>
        </div>  
        <div class="row mb-3 justify-content-center">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            @foreach ($lembaga as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{!!$item->keterangan!!}</td>
                  <td>
                    <a href="/admin/kelembagaan/{{$item->uri}}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pen"></i></a>
                    <form action="/admin/kelembagaan/{{$item->uri}}" method="post" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
            @endforeach
          </table>
        </div>
      @endif
    </div>
@endsection