@extends('layout.app')

@section('content')
    <div class="title_body">
        <div class="container mt-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="mb-0">Data Balita</h1>
                <a href="/addDataBalita" class="btn btn-primary">+ Add Data</a>
            </div>
        </div>
    </div>

    {{-- <a href="{{ route('balitas.exportPDF') }}" class="btn btn-danger mb-3">Export PDF</a> --}}
    <div class="table-responsive">
        <div class="container mt-4">
            <div class="row justify-content-between">
                <div class="col-6">
                  <a href="{{ route('exportPDFBalita', ['bulan' => request('bulan')]) }}" class="btn btn-success mb-4" target="_blank">
                    Export PDF
                  </a>              
                </div>            
                <div class="col-4 text-end">
                    <div class="mb-3">
                      <form action="/dashboardBalita" method="GET">
                        <input type="text" name="search" class="form-control" id="exampleFormControlInput1" placeholder="Cari Nama..." value="{{ request('search') }}">
                      </form>
                    </div>
                </div>
                <div class="col-2 text-end">
                  <form action="/dashboardBalita" method="GET">
                    <select class="form-select" name="bulan" id="bulan" onchange="this.form.submit()">
                        <option value="">-- Pilih Bulan --</option>
                        @foreach(range(1, 12) as $bulan)
                            <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                  </form>                
                </div>
            </div>
            <table class="table align-middle table-bordered table-hover">
                <thead class="text-center align-top">
                    <tr>
                        <th>No</th>
                        <th>Nama Anak</th>
                        <th>NIK</th>
                        <th>No. KK</th>
                        <th>Tanggal Lahir</th>
                        <th>
                          @if ($selectedBulan)
                            Berat Badan ({{ $selectedBulan ? DateTime::createFromFormat('!m', $selectedBulan)->format('F') : '-' }})
                          @else
                            Berat Badan Waktu Lahir
                          @endif
                        </th>
                        <th>
                          @if ($selectedBulan)
                            Panjang Badan ({{ $selectedBulan ? DateTime::createFromFormat('!m', $selectedBulan)->format('F') : '-' }})
                          @else
                            Panjang Badan Waktu Lahir
                          @endif
                        </th>
                        <th>
                          @if ($selectedBulan)
                            Lingkar Kepala ({{ $selectedBulan ? DateTime::createFromFormat('!m', $selectedBulan)->format('F') : '-' }})
                          @else
                            Lingkar Kepala Waktu Lahir
                          @endif
                        </th>
                        <th>Nama Ayah</th>
                        <th>Nama Ibu</th>
                        <th>Alamat</th>
                        <th>Posyandu</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center align-top">
                    @foreach($balitas as $index => $balita)
                        <tr onclick="window.location='{{ route('balita.show', $balita->id) }}';" style="cursor: pointer;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $balita->namaAnak }}</td>
                            <td>{{ $balita->nik }}</td>
                            <td>{{ $balita->nkk }}</td>
                            <td>{{ $balita->tanggalLahir }}</td>
                            {{-- Menampilkan data berat badan sesuai bulan yang dipilih --}}
                            <td>
                              @if ($selectedBulan)
                                  @php
                                      $beratBadan = $balita->beratBadanBulanan->first() ? $balita->beratBadanBulanan->first()->beratBadanBulanan : 'N/A';
                                  @endphp
                                  {{ $beratBadan }} g
                              @else
                                  {{ $balita->beratBadanLahir }} g
                              @endif
                            </td>
                            <td>
                              @if ($selectedBulan)
                                  @php
                                      $panjangBadan = $balita->panjangBadanBulanan->first() ? $balita->panjangBadanBulanan->first()->panjangBadanBulanan : 'N/A';
                                  @endphp
                                  {{ $panjangBadan }} Cm
                              @else
                                  {{ $balita->panjangBadan }} Cm
                              @endif
                            </td>
                            <td>
                              @if ($selectedBulan)
                                  @php
                                      $lingkarKepala = $balita->lingkarKepalaBulanan->first() ? $balita->lingkarKepalaBulanan->first()->lingkarKepalaBulanan : 'N/A';
                                  @endphp
                                  {{ $lingkarKepala }} Cm
                              @else
                                  {{ $balita->lingkarKepala }} Cm
                              @endif
                            </td>
                            <td>{{ $balita->namaAyah }}</td>
                            <td>{{ $balita->namaIbu }}</td>
                            <td>{{ $balita->alamat }}</td>
                            <td>{{ $balita->posyandu }}</td>
                            <td>{{ $balita->tanggalPendaftaran }}</td>
                            <td>
                                <a href="{{ route('balita.edit', $balita->id) }}" class="btn btn-info mb-2">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('balita.destroy', $balita->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                      </svg>
                                      <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
@endsection
