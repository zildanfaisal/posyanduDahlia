@extends('layout.app')

@section('content')
    <div class="container pt-2 pb-2 mb-2" style="background-color: rgb(241, 241, 241); border-radius: 10px;">
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
                </table>
            </div>
            <div class="col">
                <table class="table table-borderless">
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
        </div>
        <div class="row justify-content-between">
            {{-- Berat Badan --}}
            <div class="col" style="border-radius: 10px; background-color: rgb(241, 241, 241); padding-top: 20px;">
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
            {{-- End Berat Badan --}}

            {{-- Panjang Badan --}}
            <div class="col" style="border-radius: 10px; background-color: rgb(241, 241, 241); margin-left: 20px; margin-right: 20px; padding-top: 20px;">
                <h3>Input Panjang Badan Bulanan</h3>
                <form action="{{ route('panjangBadanBulanan.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="balita_id" value="{{ $balita->id }}">
                    <input class="form-control mb-2" type="number" name="panjangBadanBulanan" step="0.1" required placeholder="Masukkan Panjang Badan...">
                    <input class="form-control mb-2" type="date" name="tanggal" required>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
                
                <h3>Panjang Badan Bulan</h3>
                <div class="table text-center" style="max-height: 200px; overflow-y: auto;">
                    <table class="table table-bordered" style="border-radius: 10px; overflow: hidden;">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Panjang Badan (cm)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($balita->panjangBadanBulanan()->orderBy('tanggal', 'asc')->get() as $panjangBadan)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($panjangBadan->tanggal)->format('F Y') }}</td>
                                    <td>{{ $panjangBadan->panjangBadanBulanan }} cm</td>
                                    <td>
                                        <form action="{{ route('panjangBadanBulanan.destroy', $panjangBadan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
            {{-- End Panjang Badan --}}

            {{-- Lingkar Kepala --}}
            <div class="col" style="border-radius: 10px; background-color: rgb(241, 241, 241); padding-top: 20px;">
                <h3>Input Lingkar Kepala Bulanan</h3>
                <form action="{{ route('lingkarKepalaBulanan.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="balita_id" value="{{ $balita->id }}">
                    <input class="form-control mb-2" type="number" name="lingkarKepalaBulanan" step="0.1" required placeholder="Masukkan Lingkar Kepala...">
                    <input class="form-control mb-2" type="date" name="tanggal" required>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
                
                <h3>Lingkar Kepala Bulan</h3>
                <div class="table text-center" style="max-height: 200px; overflow-y: auto;">
                    <table class="table table-bordered" style="border-radius: 10px; overflow: hidden;">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Lingkar Kepala (cm)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($balita->lingkarKepalaBulanan()->orderBy('tanggal', 'asc')->get() as $lingkarKepala)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($lingkarKepala->tanggal)->format('F Y') }}</td>
                                    <td>{{ $lingkarKepala->lingkarKepalaBulanan }} cm</td>
                                    <td>
                                        <form action="{{ route('lingkarKepalaBulanan.destroy', $beratBadan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
            {{-- End Lingkar Kepala --}}
        </div>
    </div>
    
@endsection
