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
    {{-- Table Ibu Hamil --}}
    <h2>Data Ibu Hamil</h2>
  
    <table>
        <thead>
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
        <tbody>
            @foreach($ibuHamil as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->namaIbuHamil }}</td>
                <td>{{ $dt->tempatLahir }}</td>
                <td>{{ $dt->tanggalLahir }}</td>
                <td>{{ $dt->alamat }}</td>
                <td>{{ $dt->beratBadan }}</td>
                <td>{{ $dt->lila }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>