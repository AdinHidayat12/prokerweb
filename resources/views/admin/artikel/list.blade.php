@extends('layout/admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      <div class="row mb-3">
        <div class="col-lg-8">
          <h5>Daftar Artikel</h5>
        </div>
        <div class="col-lg-4 text-end">
          <a href="/dashboard" class="text-decoration-none text-danger"><i class="bi bi-arrow-left ms-2"></i> Kembali</a>
        </div>
      </div>
      <div class="row mb-3 justify-content-center">
        @if (session()->has('article_created'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('article_created')}}
          </div>            
        @endif
        @if (session()->has('article_deleted'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-trash me-2"></i>{{session('article_deleted')}}
          </div>            
        @endif
        @if (session()->has('article_edited'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-pen me-2"></i>{{session('article_edited')}}
          </div>            
        @endif
        <div class="col-lg-6">
          <form action="/admin/article">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari artikel..." name="cari" value="{{ request('cari')}}">
              <button class="btn text-white" type="submit" style="background-color: #a47148"><i class="bi bi-search"></i></button>
            </div>
          </form>
        </div>
        <div class="col-lg-3">
          <a href="/admin/article/create" class="btn shadow text-white" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah</a>
        </div>
      </div>
      <div class="row mb-3 justify-content-center">
        @if (count($data)>0)
        <div class="col-lg-11">
          <table class="table">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->judul}}</td>
                  <td>{{date("d-m-y", strtotime($item->created_at))}}</td>
                  <td  style="width: 150px">
                    <a href="/admin/article/{{$item->uri}}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="/admin/article/{{$item->uri}}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pen"></i></a>
                    <form action="/admin/article/{{$item->uri}}" method="post" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus artikel ini?')"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
            <div class="col-lg-8 text-center">
              <img src="/images/pns-min.jpg" alt="" class="img-fluid" style="width: 30%">
              <h4>Ups! Tidak ada artikel</h4>
            </div>
        @endif
      </div>
    </div>
@endsection