@extends('layout.app')

@section('content')
    {{-- Form Balita --}}
    <div class="title_body">
      <div class="container mt-4 mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
              <h1 class="mb-0">Form Edit Data Balita</h1>
              <a href="/dashboardBalita" class="btn btn-primary">Data Balita</a>
          </div>
      </div>
    </div>

    <div class="form">
      <div class="container mb-4">
            <form action="{{ route('balita.update', $balita->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama Anak</label>
                  <input type="text" class="form-control" id="namaAnak" name="namaAnak" value="{{ $balita->namaAnak }}" placeholder="Masukkan Nama Anak...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" value="{{ $balita->nik }}" placeholder="Masukkan Nama Anak...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No. KK</label>
                <input type="number" class="form-control" id="nkk" name="nkk" value="{{ $balita->nkk }}" placeholder="Masukkan Nama Anak...">
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="{{ $balita->tanggalLahir }}" placeholder="Masukkan Tanggal Lahir...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Berat Badan Waktu Lahir</label>
                <input type="number" class="form-control" id="beratBadan" name="beratBadanLahir" value="{{ $balita->beratBadanLahir }}" placeholder="Masukkan Posyandu...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Panjang Badan Waktu Lahir</label>
                <input type="number" class="form-control" id="panjangBadan" name="panjangBadan" value="{{ $balita->panjangBadan }}" placeholder="Masukkan Posyandu...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Lingkar Kepala</label>
                <input type="number" class="form-control" id="lingkarKepala" name="lingkarKepala" value="{{ $balita->lingkarKepala }}" placeholder="Masukkan Posyandu...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="namaAyah" name="namaAyah" value="{{ $balita->namaAyah }}" placeholder="Masukkan Nama Anak...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="namaIbu" name="namaIbu" value="{{ $balita->namaIbu }}" placeholder="Masukkan Nama Anak...">
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat...">{{ $balita->alamat }}</textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Posyandu</label>
                <input type="text" class="form-control" id="posyandu" name="posyandu" value="{{ $balita->posyandu }}" placeholder="Masukkan Nama Anak...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Pendaftaran</label>
                <input type="date" class="form-control" id="tanggalPendaftaran" name="tanggalPendaftaran" value="{{ $balita->tanggalPendaftaran }}" placeholder="Masukkan Tanggal Lahir...">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
          </form>
      </div>
    </div>
@endsection