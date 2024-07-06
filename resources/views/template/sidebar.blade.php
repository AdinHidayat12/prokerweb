<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <img src="/images/logo.png" alt="" class="img-fluid" style="width: 30px">
    <span class="fs-5 fw-bold ms-2">Halo, {{auth()->user()->name}}</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto fs-5 sticky-top">
    <li class="nav-item">
      <a href="/dashboard" class="nav-link link-dark" @if($title === 'Beranda') style="background-color: #a47148; color:antiquewhite" @endif>
        <i class="bi bi-house-door me-2"></i>Beranda
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/article" class="nav-link link-dark "@if($title === 'Artikel') style="background-color: #a47148; color:antiquewhite" @endif>
        <i class="bi bi-file-earmark-post me-2"></i>Artikel
      </a>
    </li>
    <li>
      <a href="/admin/pemerintahan" class="nav-link link-dark" @if($title === 'Pemerintahan') style="background-color: #a47148; color:antiquewhite" @endif>
        <i class="bi bi-flag me-2"></i>Pemerintahan
      </a>
    </li>
    <li>
      <a href="/admin/profil_desa" class="nav-link link-dark" @if($title === 'Profil Desa') style="background-color: #a47148; color:antiquewhite" @endif>
        <i class="bi bi-geo-alt me-2"></i>Profil Desa
      </a>
    </li>
    <li>
      <a href="/admin/kelembagaan" class="nav-link link-dark" @if($title === 'Kelembagaan Desa') style="background-color: #a47148; color:antiquewhite" @endif>
        <i class="bi bi-people me-2"></i>Kelembagaan
      </a>
    </li>
    <li>
      <a href="/admin/data_desa" class="nav-link link-dark" @if($title === 'Data Desa') style="background-color: #a47148; color:antiquewhite" @endif>
        <i class="bi bi-clipboard-data me-2"></i>Data Desa
      </a>
    </li>
  </ul>
  <div class="dropdown fixed-bottom" style="bottom: 20px; left: 30px">
    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="/images/avatar.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>{{auth()->user()->name}}</strong>
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
      <li>
        <form action="/keluar" method="POST">
          @csrf
          <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-1"></i>Keluar</button>
        </form>
      </li>
    </ul>
  </div>
</div>
<style>
  .nav-link:hover{
    background-color: #a47148;
    color:antiquewhite;
  }
</style>