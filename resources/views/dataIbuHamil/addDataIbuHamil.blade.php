@extends('layout.app')

@section('content')
    {{-- Form Ibu Hamil --}}
    <div class="title_body">
      <div class="container mt-4 mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
              <h1 class="mb-0">Form Data Ibu Hamil</h1>
              <a href="/dashboardIbuHamil" class="btn btn-primary">Data Ibu Hamil</a>
          </div>
      </div>
    </div>

    <div class="form">
      <div class="container mb-4">
          <form action="/storeDataIbuHamil" method="POST">
            @csrf
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama Ibu Hamil</label>
                  <input type="text" class="form-control" id="namaIbuHamil" name="namaIbuHamil" placeholder="Masukkan Nama Ibu Hamil...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Masukkan Tempat Lahir...">
            </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Masukkan Tanggal Lahir...">
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat..."></textarea>
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Berat Badan</label>
                  <input type="number" class="form-control" id="beratBadan" name="beratBadan" placeholder="Masukkan Berat Badan...">
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">LiLa (Lingkar Lengan Atas)</label>
                  <input type="number" class="form-control" id="lila" name="lila" placeholder="Masukkan LiLa...">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
          </form>
      </div>
    </div>
@endsection