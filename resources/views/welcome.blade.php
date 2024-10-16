@extends('layout.app')

@section('content')

    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
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
    </div>

    {{-- Table Balita --}}
    <div class="title_body">
      <div class="container mt-4 mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
              <h1 class="mb-0">Data Balita</h1>
              <a href="/addDataBalita" class="btn btn-primary">+ Add Data</a>
          </div>
      </div>
  </div>

  <div class="table-responsive">
      <div class="container mt-4">
          <table class="table align-middle table-bordered table-hover">
              <thead class="text-center align-top">
                  <tr>
                      <th>No</th>
                      <th>Nama Anak</th>
                      <th>NIK</th>
                      <th>No. KK</th>
                      <th>Tanggal Lahir</th>
                      <th>Berat Badan Waktu Lahir</th>
                      <th>Panjang Badan Waktu Lahir</th>
                      <th>Lingkar Kepala</th>
                      <th>Nama Ayah</th>
                      <th>Nama Ibu</th>
                      <th>Alamat</th>
                      <th>Posyandu</th>
                      <th>Tanggal Pendaftaran</th>
                  </tr>
              </thead>
              <tbody class="text-center align-top">
                  @forelse($balitas as $balita)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $balita->namaAnak }}</td>
                          <td>{{ $balita->nik }}</td>
                          <td>{{ $balita->nkk }}</td>
                          <td>{{ $balita->tanggalLahir }}</td>
                          <td>{{ $balita->beratBadan }} Kg</td>
                          <td>{{ $balita->panjangBadan }} Cm</td>
                          <td>{{ $balita->lingkarKepala }} Cm</td>
                          <td>{{ $balita->namaAyah }}</td>
                          <td>{{ $balita->namaIbu }}</td>
                          <td>{{ $balita->alamat }}</td>
                          <td>{{ $balita->posyandu }}</td>
                          <td>{{ $balita->tanggalPendaftaran }}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="13" class="text-center">Data tidak ditemukan</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
  </div>

    {{-- Table Ibu Hamil --}}
    <div class="title_body">
      <div class="container mt-4 mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
              <h1 class="mb-0">Data Ibu Hamil</h1>
              <a href="/addDataIbuHamil" class="btn btn-primary">+ Add Data</a>
          </div>
      </div>
    </div>

    <div class="table-responsive">
      <div class="container mt-4">
        <table class="table align-middle table-bordered table-hover">
            <thead class="text-center align-top">
                <tr>
                    <th>No</th>
                    <th>Nama Ibu Hamil</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Berat Badan</th>
                    <th>LiLa (Lingkar Lengan Atas)</th>
                </tr>
            </thead>
            <tbody class="text-center align-top">
                @forelse($ibuHamil as $dt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->namaIbuHamil }}</td>
                    <td>{{ $dt->tempatLahir }}</td>
                    <td>{{ $dt->tanggalLahir }}</td>
                    <td>{{ $dt->alamat }}</td>
                    <td>{{ $dt->beratBadan }}</td>
                    <td>{{ $dt->lila }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
@endsection