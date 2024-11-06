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
                    <a href="{{ route('exportPDFBalita') }}" class="btn btn-success mb-4" target="_blank">
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
                    {{-- <form action="/dashboardBalita" method="GET">
                        <select class="form-select" name="bulan" id="bulan" onchange="this.form.submit()">
                            <option value="">-- Pilih Bulan --</option>
                            @foreach(range(1, 12) as $bulan)
                                <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                                    {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                    </form> --}}
                    <form>
                      <select class="form-select" name="bulan" id="bulan">
                          <option value="">-- Pilih Bulan --</option>
                          {{-- @foreach(range(1, 12) as $bulan)
                              <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                                  {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
                              </option>
                          @endforeach --}}
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
                        <th>Berat Badan Waktu Lahir</th>
                        <th>Panjang Badan Waktu Lahir</th>
                        <th>Lingkar Kepala</th>
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
                            <td>{{ $balita->beratBadanLahir }} g</td>
                            <td>{{ $balita->panjangBadan }} Cm</td>
                            <td>{{ $balita->lingkarKepala }} Cm</td>
                            <td>{{ $balita->namaAyah }}</td>
                            <td>{{ $balita->namaIbu }}</td>
                            <td>{{ $balita->alamat }}</td>
                            <td>{{ $balita->posyandu }}</td>
                            <td>{{ $balita->tanggalPendaftaran }}</td>
                            <td>
                                <a href="{{ route('balita.edit', $balita->id) }}" class="btn btn-info mb-2">Edit</a>
                                <form action="{{ route('balita.destroy', $balita->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
