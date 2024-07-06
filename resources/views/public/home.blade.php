@extends('layout/public')

@section('content')
    <div class="container p-3">
      <div class="row mb-3">
        <div class="col-lg-1">
          <img src="/images/logo.png" alt="" class="img-fluid" style="height: 100px; object-fit: contain;">
        </div>
        <div class="col-lg-5">
          <p class="text-uppercase">selamat datang di website resmi</p>
          <h1 class="text-uppercase">desa kamurang</h1>
        </div>
        <div class="col-lg-6">
          <p><i class='bx bx-user me-2'></i>contact person : +62-899-9902-090</p>
          <p><i class='bx bx-map me-2'></i>Kecamatan Cikalong Kulon, Kabupaten Cianjur, Provinsi Jawa Barat</p>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-8">
          @if (!count($foto))
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <img src="/images/gb1.png" class="d-block w-100 h-50 img-fluid" alt="..." style="border-radius: 10px">
              </div>
              <div class="carousel-item">
                <img src="/images/gb2.jpeg" class="d-block w-100" alt="..." style="border-radius: 10px">
              </div>
              <div class="carousel-item">
                <img src="/images/gb3.png" class="d-block w-100" alt="..." style="border-radius: 10px">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          @else
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              @foreach ($foto as $fo)
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->index}}" @if($loop->index === 0) class="active" aria-current="true" @endif aria-label="Slide 1"></button>
              @endforeach
            </div>
            <div class="carousel-inner">
              @foreach ($foto as $item)
              <div class="carousel-item @if($loop->index === 0) active @endif">
                <img src="{{asset('storage/'.$item->gambar)}}" class="d-block w-100" alt="..." style="object-fit: contain" height="400">
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{$item->judul}}</h5>
                </div>
              </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          @endif
        </div>
        <div class="col-lg-4">
          <div class="card" style="width: 18rem;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.191563507712!2d107.2272024!3d-6.7042991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ab2601808755%3A0x70877a3ad108d7d2!2sKantor%20Desa%20Kamurang!5e0!3m2!1sid!2sid!4v1674467780221!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="card-body">
              <h5 class="card-title">Desa Kamurang</h5>
              <q>{{$visi[0]->visi}}</q>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Kepala Desa: {{$kades? $kades->nama: 'Andi'}}</li>
              <li class="list-group-item">Sekretaris: {{$sekdes? $sekdes->nama: ''}}</li>
              <li class="list-group-item">{{$bendes? $bendes->jabatan : 'Bendahara'}}: {{$bendes? $bendes->nama: '' }}</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-11">
          @foreach ($artikel as $item)
          <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="@if($item->gambar) {{asset('storage/'.$item->gambar)}} @else https://source.unsplash.com/1600x900/?{{$item->judul}} @endif" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$item->judul}}</h5>
                  <p class="card-text">{{$item->preview}}</p>
                  <p class="card-text"><small class="text-muted">{{$item->created_at->diffForHumans()}}</small></p>
                  <a href="/artikel/{{$item->uri}}" class="text-decoration-none btn btn-sm" style="background-color: #e7bc91">Baca selengkapnya <i class='bx bx-chevron-right'></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <div class="text-center">
            <a href="/artikel" class="text-decoration-none">Lihat artikel lainnya <i class='bx bx-right-arrow-alt'></i></a>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-dark text-white p-4 mt-5">
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <h5>Tentang Desa Kamurang</h5>
                  <p>Desa Kamurang adalah desa yang terletak di Kecamatan Cikalong Kulon Kabupaten Cianjur, Jawa Barat. Kami berkomitmen untuk meningkatkan kualitas hidup masyarakat desa melalui berbagai program dan kegiatan.</p>
              </div>
              <div class="col-md-4">
                  <h5>Kontak Kami</h5>
                  <ul class="list-unstyled">
                      <li>Alamat: Jl. Raya Kamuarang No. 123, Klaten</li>
                      <li>Email: info@desakamuarang.id</li>
                      <li>Telepon: (0272) 123-456</li>
                  </ul>
              </div>
              <div class="col-md-4">
                  <h5>Tautan Berguna</h5>
                  <ul class="list-unstyled">
                      <li><a href="/" class="text-white text-decoration-none">Beranda</a></li>
                      <li><a href="/tentang" class="text-white text-decoration-none">Tentang Kami</a></li>
                      <li><a href="/kontak" class="text-white text-decoration-none">Kontak</a></li>
                      <li><a href="/artikel" class="text-white text-decoration-none">Artikel</a></li>
                  </ul>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col text-center">
                  <p>&copy; Adin Hidayat dan Dede Sani KKN UNSUR Desa Kamurang 2024. Hak Cipta Dilindungi.</p>
              </div>
          </div>
      </div>
  </footer>
@endsection