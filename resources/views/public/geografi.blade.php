@extends('layout/public')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
      @if (!count($data))
        <div class="row justify-content-center mb-3">
          <div class="col-lg-6 text-center">
            <img src="/images/pns-min.jpg" alt="" class="img-fluid" style="width: 30%">
            <h4>Ups! Tidak ada data</h4>
          </div>
        </div>
      @else
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
                ><i class="bx bx-map me-1"></i>Kondisi Geografis</a
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
                ><i class="bx bx-money me-1"></i>Kondisi Ekonomi</a
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
              <div class="container card">
                <h3>Kondisi Geografis Desa</h3>
                <hr>
                <div>
                  {!!$data[0]->geografis!!}
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="ex3-tabs-2"
              role="tabpanel"
              aria-labelledby="ex3-tab-2"
            >
              <div class="container card">
                <h3>Kondisi Ekonomi Desa</h3>
                <hr>
                <div>
                  {!!$data[0]->ekonomi!!}
                </div>
              </div>
            </div>
          </div>
          <!-- Tabs content -->  
      @endif
    </div>
@endsection