@extends('layout.app')

@section('content')
    <div class="container pt-2 pb-2" style="background-color: rgb(241, 241, 241); border-radius: 10px;">
        <h1>{{ $balita->namaAnak }}</h1>
    </div>

    <div class="container">
        <div class="row justify-content-between mt-4 mb-4">
            <div class="col">
                <table class="table">
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
                <table class="table">
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
                    <div class="input-group mb-2">
                        <input class="form-control" type="number" name="beratBadanBulanan" step="0.1" required placeholder="Masukkan Berat Badan...">
                        <span class="input-group-text">g</span>
                    </div>
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
                </div>
            </div>
            {{-- End Berat Badan --}}

            {{-- Panjang Badan --}}
            <div class="col" style="border-radius: 10px; background-color: rgb(241, 241, 241); margin-left: 20px; margin-right: 20px; padding-top: 20px;">
                <h3>Input Panjang Badan Bulanan</h3>
                <form action="{{ route('panjangBadanBulanan.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="balita_id" value="{{ $balita->id }}">
                    <div class="input-group mb-2">
                        <input class="form-control" type="number" name="panjangBadanBulanan" step="0.1" required placeholder="Masukkan Panjang Badan...">
                        <span class="input-group-text">cm</span>
                    </div>
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
                </div>
            </div>
            {{-- End Panjang Badan --}}

            {{-- Lingkar Kepala --}}
            <div class="col" style="border-radius: 10px; background-color: rgb(241, 241, 241); padding-top: 20px;">
                <h3>Input Lingkar Kepala Bulanan</h3>
                <form action="{{ route('lingkarKepalaBulanan.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="balita_id" value="{{ $balita->id }}">
                    <div class="input-group mb-2">
                        <input class="form-control" type="number" name="lingkarKepalaBulanan" step="0.1" required placeholder="Masukkan Lingkar Kepala...">
                        <span class="input-group-text">cm</span>
                    </div>
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
                </div>
            </div>
            {{-- End Lingkar Kepala --}}
        </div>
        
        <div class="row mt-4">
            <!-- Grafik Berat Badan -->
            <div class="col">
                <h3>Grafik Berat Badan Bulanan</h3>
                <canvas id="beratBadanChart"></canvas>
            </div>
        
            <!-- Grafik Panjang Badan -->
            <div class="col">
                <h3>Grafik Panjang Badan Bulanan</h3>
                <canvas id="panjangBadanChart"></canvas>
            </div>
        
            <!-- Grafik Lingkar Kepala -->
            <div class="col">
                <h3>Grafik Lingkar Kepala Bulanan</h3>
                <canvas id="lingkarKepalaChart"></canvas>
            </div>
        </div>
        

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Data Berat Badan
                const beratBadanLabels = [
                    @foreach ($balita->beratBadanBulanan()->orderBy('tanggal', 'asc')->get() as $beratBadan)
                        "{{ \Carbon\Carbon::parse($beratBadan->tanggal)->format('F Y') }}",
                    @endforeach
                ];
                const beratBadanData = [
                    @foreach ($balita->beratBadanBulanan()->orderBy('tanggal', 'asc')->get() as $beratBadan)
                        {{ $beratBadan->beratBadanBulanan }},
                    @endforeach
                ];
        
                // Inisialisasi Chart Berat Badan
                const ctxBeratBadan = document.getElementById('beratBadanChart').getContext('2d');
                new Chart(ctxBeratBadan, {
                    type: 'bar',
                    data: {
                        labels: beratBadanLabels,
                        datasets: [{
                            label: 'Berat Badan (g)',
                            data: beratBadanData,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        
                // Data Panjang Badan (untuk grafik kedua)
                const panjangBadanLabels = [
                    @foreach ($balita->panjangBadanBulanan()->orderBy('tanggal', 'asc')->get() as $panjangBadan)
                        "{{ \Carbon\Carbon::parse($panjangBadan->tanggal)->format('F Y') }}",
                    @endforeach
                ];
                const panjangBadanData = [
                    @foreach ($balita->panjangBadanBulanan()->orderBy('tanggal', 'asc')->get() as $panjangBadan)
                        {{ $panjangBadan->panjangBadanBulanan }},
                    @endforeach
                ];
        
                // Inisialisasi Chart Panjang Badan
                const ctxPanjangBadan = document.getElementById('panjangBadanChart').getContext('2d');
                new Chart(ctxPanjangBadan, {
                    type: 'bar',
                    data: {
                        labels: panjangBadanLabels,
                        datasets: [{
                            label: 'Panjang Badan (cm)',
                            data: panjangBadanData,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        
                // Data Lingkar Kepala (untuk grafik ketiga)
                const lingkarKepalaLabels = [
                    @foreach ($balita->lingkarKepalaBulanan()->orderBy('tanggal', 'asc')->get() as $lingkarKepala)
                        "{{ \Carbon\Carbon::parse($lingkarKepala->tanggal)->format('F Y') }}",
                    @endforeach
                ];
                const lingkarKepalaData = [
                    @foreach ($balita->lingkarKepalaBulanan()->orderBy('tanggal', 'asc')->get() as $lingkarKepala)
                        {{ $lingkarKepala->lingkarKepalaBulanan }},
                    @endforeach
                ];
        
                // Inisialisasi Chart Lingkar Kepala
                const ctxLingkarKepala = document.getElementById('lingkarKepalaChart').getContext('2d');
                new Chart(ctxLingkarKepala, {
                    type: 'bar',
                    data: {
                        labels: lingkarKepalaLabels,
                        datasets: [{
                            label: 'Lingkar Kepala (cm)',
                            data: lingkarKepalaData,
                            backgroundColor: 'rgba(153, 102, 255, 0.6)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </div>
    
@endsection
