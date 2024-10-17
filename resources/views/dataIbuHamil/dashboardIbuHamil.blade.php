@extends('layout.app')

@section('content')
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
        <a href="{{ route('exportPDFIbuHamil') }}" class="btn btn-success mb-4" target="_blank">
          Export PDF
      </a>
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
              <th>Aksi</th>
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
              <td>
                <a href="{{ route('ibuHamil.edit', $dt->id) }}" class="btn btn-info mb-2">Edit</a>
                <form action="{{ route('ibuHamil.destroy', $dt->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
          </tr>
            @empty
            <tr>
              <td colspan="11" class="text-center">Data tidak ditemukan</td>
            </tr>
            @endforelse
          </tbody>  
        </table>
        </div>
    </div>
@endsection