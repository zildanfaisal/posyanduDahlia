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
                <a href="{{ route('ibuHamil.edit', $dt->id) }}" class="btn btn-info mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg>
                  <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('ibuHamil.destroy', $dt->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
            @empty
            <tr>
              <td colspan="11" class="text-center">Data tidak ditemukan</td>
            </tr>
            @endforelse
          </tbody>  
        </table>
        
        <div class="d-flex justify-content-between align-items-center mt-3">
          {{-- Teks "Showing ..." di sebelah kiri --}}
          <div>
            <p class="mb-0">
              Showing {{ $ibuHamil->firstItem() }} to {{ $ibuHamil->lastItem() }} of {{ $ibuHamil->total() }} results
            </p>
          </div>
        
          {{-- Pagination di sebelah kanan --}}
          <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
              {{-- Tombol Previous --}}
              @if ($ibuHamil->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $ibuHamil->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
        
              {{-- Nomor Halaman --}}
              @foreach ($ibuHamil->links()->elements[0] as $page => $url)
                <li class="page-item {{ $page == $ibuHamil->currentPage() ? 'active' : '' }}">
                  <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
              @endforeach
        
              {{-- Tombol Next --}}
              @if ($ibuHamil->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $ibuHamil->nextPageUrl() }}" aria-label="Next">
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