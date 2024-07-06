@extends('layout/admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
        @if (session()->has('visi_edited'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('visi_edited')}}
          </div>            
        @endif
        @if (session()->has('officials_created'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('officials_created')}}
          </div>            
        @endif
        @if (session()->has('councils_created'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('councils_created')}}
          </div>            
        @endif
        @if (session()->has('councils_updated'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('councils_updated')}}
          </div>            
        @endif
        @if (session()->has('councils_deleted'))
          <div class="alert alert-warning" role="alert">
            <i class="bi bi-check me-2"></i>{{session('councils_deleted')}}
          </div>            
        @endif
        @if (session()->has('officials_updated'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('officials_updated')}}
          </div>            
        @endif
        @if (session()->has('officials_deleted'))
          <div class="alert alert-warning" role="alert">
            <i class="bi bi-check me-2"></i>{{session('officials_deleted')}}
          </div>            
        @endif
      <div class="row mb-3">
        <div class="col-lg-12">
          <!-- Tabs navs -->
          <ul class="nav nav-tabs nav-fill mb-3 mt-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
              <a
                class="nav-link active"
                id="ex2-tab-1"
                data-bs-toggle="tab"
                href="#ex2-tabs-1"
                role="tab"
                aria-controls="ex2-tabs-1"
                aria-selected="true"
                >Pemerintahan Desa</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="ex2-tab-2"
                data-bs-toggle="tab"
                href="#ex2-tabs-2"
                role="tab"
                aria-controls="ex2-tabs-2"
                aria-selected="false"
                >Badan Permusyawaratan Desa</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="ex2-tab-3"
                data-bs-toggle="tab"
                href="#ex2-tabs-3"
                role="tab"
                aria-controls="ex2-tabs-3"
                aria-selected="false"
                >Visi & Misi Desa</a
              >
            </li>
          </ul>
          <!-- Tabs navs -->

          <!-- Tabs content -->
          <div class="tab-content" id="ex2-content">
            <div
              class="tab-pane fade show active"
              id="ex2-tabs-1"
              role="tabpanel"
              aria-labelledby="ex2-tab-1"
            >
              <div class="container">
                <div class="row mb-2">
                  <div class="col-lg-6">
                    <h4 class="text-uppercase">anggota pemerintahan desa</h4>
                  </div>
                  <div class="col-lg-6 text-end">
                    <a href="/admin/pegawai/create" class="btn text-light shadow" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah</a>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center">
                  <div class="col-lg-12">
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          <th></th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      @foreach ($pegawai as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td><img src="@if ($item->gambar === NULL) @if($item->jenis_kelamin == 'L') /images/pria.png @else /images/wanita.png @endif @else {{asset('storage/'.$item->gambar)}}  @endif" alt="" width="50" height="50" class="rounded-circle me-2"></td>
                          <td>{{$item->nama}}</td>
                          <td>{{$item->jabatan}}</td>
                          <td>
                            <a href="/admin/pegawai/{{$item->uri}}/edit" class="btn btn-sm btn-warning shadow"><i class="bi bi-pen me-1"></i>ubah</a>
                            <form action="/admin/pegawai/{{$item->uri}}" method="POST" class="d-inline">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('Anda yakin akan menghapus pegawai ini?')"><i class="bi bi-trash me-1"></i>hapus</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="ex2-tabs-2"
              role="tabpanel"
              aria-labelledby="ex2-tab-2"
            >
            <div class="container">
              <div class="row mb-2">
                <div class="col-lg-6">
                  <h4 class="text-uppercase">badan permusyawaratan desa</h4>
                </div>
                <div class="col-lg-6 text-end">
                  <a href="/admin/pegawai/create" class="btn text-light shadow" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah</a>
                </div>
              </div>
              <div class="row mb-3 justify-content-center">
                <div class="col-lg-12">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th>Nomor</th>
                        <th></th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    @foreach ($bpd as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="@if ($item->gambar === NULL) @if($item->jenis_kelamin == 'L') /images/pria.png @else /images/wanita.png @endif @else {{asset('storage/'.$item->gambar)}}  @endif"  alt="" width="50" height="50" class="rounded-circle me-2"/></td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->jabatan}}</td>
                        <td>
                          <a href="/admin/bpd/{{$item->uri}}/edit" class="btn btn-sm btn-warning shadow"><i class="bi bi-pen me-1"></i>ubah</a>
                          <form action="/admin/bpd/{{$item->uri}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('Anda yakin akan menghapus pegawai ini?')"><i class="bi bi-trash me-1"></i>hapus</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
            </div>
            <div
              class="tab-pane fade"
              id="ex2-tabs-3"
              role="tabpanel"
              aria-labelledby="ex2-tab-3"
            >
              <div class="container">
                <div class="row mb-3 justify-content-center space-between">
                  <div class="col-lg-5 card m-3" style="border-color: #a47148">
                    <h3 class="text-center">VISI</h3>
                    <p>{{$data[0]->visi}}</p>
                  </div>
                  <div class="col-lg-5 card m-3" style="border-color: #a47148">
                    <h3 class="text-center">MISI</h3>
                    <p>{!!$data[0]->misi!!}</p>
                  </div>
                </div>
                <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#ubahVisiModal" style="background-color: #a47148">
                  Ubah Visi & Misi
                </button>
              </div>
            </div>
          </div>
          <!-- Tabs content -->
        </div>
      </div>
    </div>
    @include('modals/edit_visi')
@endsection