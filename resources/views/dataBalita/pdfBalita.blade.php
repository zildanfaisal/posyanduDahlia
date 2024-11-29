<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posyandu</title>
    <style>
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .balita th {
            font-size: 12px;
        }
        .balita td {
            font-size: 8px;
        }
    </style>
</head>
<body>
    {{-- Table Balita --}}
    <div class="balita">
        @if($selectedBulan)
            <h2>{{ DateTime::createFromFormat('!m', $selectedBulan)->format('F') }}</h2>
        @else
            <h2>Data Balita</h2>
        @endif
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anak</th>
                    <th>NIK</th>
                    <th>No. KK</th>
                    <th>Tanggal Lahir</th>
                    <th>Berat Badan</th>
                    <th>Panjang Badan</th>
                    <th>Lingkar Kepala</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Alamat</th>
                    <th>Posyandu</th>
                    <th>Tanggal Pendaftaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($balitas as $balita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $balita->namaAnak }}</td>
                        <td>{{ $balita->nik }}</td>
                        <td>{{ $balita->nkk }}</td>
                        <td>{{ $balita->tanggalLahir }}</td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>