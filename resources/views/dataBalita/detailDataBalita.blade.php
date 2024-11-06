@extends('layout.app')

@section('content')
    <div class="container pt-2 pb-2 mb-4" style="background-color: rgb(241, 241, 241); border-radius: 10px;">
        <h1>{{ $balita->namaAnak }}</h1>
    </div>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama Anak</th>
                        <td>{{ $balita->namaAnak }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $balita->nik }}</td>
                    </tr>
                    <tr>
                        <th>No. KK</th>
                        <td>{{ $balita->nkk }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $balita->tanggalLahir }}</td>
                    </tr>
                    <tr>
                        <th>Berat Badan Waktu Lahir</th>
                        <td>{{ $balita->beratBadanLahir }}</td>
                    </tr>
                    <tr>
                        <th>Panjang Badan</th>
                        <td>{{ $balita->panjangBadan }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Kepala</th>
                        <td>{{ $balita->lingkarKepala }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $balita->namaAyah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $balita->namaIbu }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $balita->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Posyandu</th>
                        <td>{{ $balita->posyandu }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pendaftaran</th>
                        <td>{{ $balita->tanggalPendaftaran }}</td>
                    </tr>
                </table>
            </div>
            <div class="col" style="border-radius: 10px; background-color: rgb(241, 241, 241); margin-left: 20px; padding-top: 20px;">
                <h3>Input Berat Badan Bulanan</h3>
                <form action="{{ route('beratBadanBulanan.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="balita_id" value="{{ $balita->id }}">
                    <input class="form-control mb-2" type="number" name="beratBadanBulanan" step="0.1" required placeholder="Masukkan Berat Badan...">
                    <input class="form-control mb-2" type="date" name="tanggal" required>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
                
                <h3>Berat Badan Bulan</h3>
                <div class="table text-center" style="max-height: 200px; overflow-y: auto;">
                    <table class="table table-bordered" style="border-radius: 10px; overflow: hidden;">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Berat Badan (g)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($balita->beratBadanBulanan()->orderBy('tanggal', 'asc')->get() as $beratBadan)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($beratBadan->tanggal)->format('F Y') }}</td>
                                    <td>{{ $beratBadan->beratBadanBulanan }} g</td>
                                    <td>
                                        <form action="{{ route('beratBadanBulanan.destroy', $beratBadan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection
