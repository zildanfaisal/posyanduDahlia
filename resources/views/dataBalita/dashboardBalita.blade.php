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
            <a href="{{ route('exportPDFBalita') }}" class="btn btn-success mb-4" target="_blank">
                Export PDF
            </a>
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
                            <td>
                                <a href="{{ route('balita.edit', $balita->id) }}" class="btn btn-info mb-2">Edit</a>
                                <form action="{{ route('balita.destroy', $balita->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="14" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
