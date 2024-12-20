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
                    <img src="{{ asset('images/foto1.jpg') }}" class="d-block w-100" alt="...">
                </div>
            <div class="carousel-item">
                <img src="{{ asset('images/foto2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/foto3.jpg') }}" class="d-block w-100" alt="...">
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
  
  <div class="container">
    <a href="{{ route('export.pdf') }}" class="btn btn-success" target="_blank">
        Export PDF
    </a>
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
                  @forelse($balitas as $index => $balita)
                      <tr onclick="window.location='{{ route('balita.show', $balita->id) }}';" style="cursor: pointer;">
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $balita->namaAnak }}</td>
                          <td>{{ $balita->nik }}</td>
                          <td>{{ $balita->nkk }}</td>
                          <td>{{ $balita->tanggalLahir }}</td>
                          <td>{{ $balita->beratBadanLahir }} g</td>
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

          <div class="d-flex justify-content-between align-items-center mt-3">
            {{-- Teks "Showing ..." di sebelah kiri --}}
            <div>
              <p class="mb-0">
                Showing {{ $balitas->firstItem() }} to {{ $balitas->lastItem() }} of {{ $balitas->total() }} results
              </p>
            </div>
          
            {{-- Pagination di sebelah kanan --}}
            <nav aria-label="Page navigation example">
              <ul class="pagination mb-0">
                {{-- Tombol Previous --}}
                @if ($balitas->onFirstPage())
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $balitas->previousPageUrl() }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                @endif
          
                {{-- Nomor Halaman --}}
                @foreach ($balitas->links()->elements[0] as $page => $url)
                  <li class="page-item {{ $page == $balitas->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endforeach
          
                {{-- Tombol Next --}}
                @if ($balitas->hasMorePages())
                  <li class="page-item">
                    <a class="page-link" href="{{ $balitas->nextPageUrl() }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                @else
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                @endif
              </ul>
            </nav>
          </div>        
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

        <div class="d-flex justify-content-between align-items-center mt-3">
            {{-- Teks "Showing ..." di sebelah kiri --}}
            <div>
              <p class="mb-0">
                Showing {{ $ibuHamil->firstItem() }} to {{ $ibuHamil->lastItem() }} of {{ $ibuHamil->total() }} results
              </p>
            </div>
          
            {{-- Pagination di sebelah kanan --}}
            <nav aria-label="Page navigation example">
              <ul class="pagination mb-0">
                {{-- Tombol Previous --}}
                @if ($ibuHamil->onFirstPage())
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $ibuHamil->previousPageUrl() }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                @endif
          
                {{-- Nomor Halaman --}}
                @foreach ($ibuHamil->links()->elements[0] as $page => $url)
                  <li class="page-item {{ $page == $ibuHamil->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endforeach
          
                {{-- Tombol Next --}}
                @if ($ibuHamil->hasMorePages())
                  <li class="page-item">
                    <a class="page-link" href="{{ $ibuHamil->nextPageUrl() }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                @else
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                @endif
              </ul>
            </nav>
          </div>
        </div>
    </div>
@endsection