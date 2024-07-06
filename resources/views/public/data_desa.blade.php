@extends('layout/public')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              id="ex3-tab-1"
              data-bs-toggle="tab"
              href="#ex3-tabs-1"
              role="tab"
              aria-controls="ex3-tabs-1"
              aria-selected="true"
              >Data Umum Desa</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="ex3-tab-2"
              data-bs-toggle="tab"
              href="#ex3-tabs-2"
              role="tab"
              aria-controls="ex3-tabs-2"
              aria-selected="false"
              >Data Profesi Warga Desa</a
            >
          </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex2-content">
          <div
            class="tab-pane fade show active"
            id="ex3-tabs-1"
            role="tabpanel"
            aria-labelledby="ex3-tab-1"
          >
            @if (count($data_umum) != 0)
              <div class="container mt-3 mb-3 p-3">
                <div class="row mb-3 justify-content-center">
                  <div class="col-lg-8">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kategori</th>
                          <th>Data</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      @foreach ($data_umum as $item)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kategori}}</td>
                            <td>{{$item->spesifik}}</td>
                            <td>{{$item->jumlah}}</td>
                          </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            @else
              <div class="container">
                <div class="row justify-content-center mb-3">
                  <div class="col-lg-6 text-center">
                    <img src="/images/pns-min.jpg" alt="" class="img-fluid" style="width: 30%">
                    <h4>Ups! Tidak ada data</h4>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div
            class="tab-pane fade"
            id="ex3-tabs-2"
            role="tabpanel"
            aria-labelledby="ex3-tab-2"
          >
          @if (count($data_profesi) != 0)
          <div class="container mt-3 mb-3 p-3">
            <div class="row mb-3 justify-content-center">
              <div class="col-lg-8">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Profesi</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  @foreach ($data_profesi as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->profesi}}</td>
                        <td>{{$item->jumlah}}</td>
                      </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        @else
          <div class="container">
            <div class="row justify-content-center mb-3">
              <div class="col-lg-6 text-center">
                <img src="/images/pns-min.jpg" alt="" class="img-fluid" style="width: 30%">
                <h4>Ups! Tidak ada data profesi</h4>
              </div>
            </div>
          </div>
        @endif
          </div>
        </div>
        <!-- Tabs content -->
    </div>
@endsection