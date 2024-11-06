<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posyandu</title>
    <style>
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
    </style>
</head>
<body>
    {{-- Table Balita --}}
    <h2>Data Balita</h2>
  
            <table>
                <thead>
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
                <tbody>
                    @foreach($balitas as $balita)
                        <tr>
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
                    @endforeach
                </tbody>
            </table>
</body>
</html>