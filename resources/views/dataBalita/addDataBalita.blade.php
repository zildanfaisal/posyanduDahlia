@extends('layout.app')

@section('content')
    {{-- Form Balita --}}
    <div class="title_body">
      <div class="container mt-4 mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
              <h1 class="mb-0">Form Data Balita</h1>
              <a href="/dashboardBalita" class="btn btn-primary">Data Balita</a>
          </div>
      </div>
    </div>

    <div class="form">
      <div class="container mb-4">
          <form action="/storeDataBalita" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama Anak</label>
                  <input type="text" class="form-control" id="namaAnak" name="namaAnak" placeholder="Masukkan Nama Anak...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK Anak...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No. KK</label>
                <input type="number" class="form-control" id="nkk" name="nkk" placeholder="Masukkan No. KK Anak...">
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Masukkan Tanggal Lahir...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Berat Badan Waktu Lahir</label>
                <input type="number" class="form-control" id="beratBadan" name="beratBadanLahir" placeholder="Masukkan Berat Badan Waktu Lahir...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Panjang Badan Waktu Lahir</label>
                <input type="number" class="form-control" id="panjangBadan" name="panjangBadan" placeholder="Masukkan Panjang Badan Waktu Lahir...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Lingkar Kepala</label>
                <input type="number" class="form-control" id="lingkarKepala" name="lingkarKepala" placeholder="Masukkan Lingkar Kepala...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="namaAyah" name="namaAyah" placeholder="Masukkan Nama Ayah...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="namaIbu" name="namaIbu" placeholder="Masukkan Nama Ibu...">
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat..."></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Posyandu</label>
                <input type="text" class="form-control" id="posyandu" name="posyandu" placeholder="Masukkan Posyandu...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Pendaftaran</label>
                <input type="date" class="form-control" id="tanggalPendaftaran" name="tanggalPendaftaran" placeholder="Masukkan Tanggal Pendaftaran...">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
          </form>
      </div>
    </div>
@endsection