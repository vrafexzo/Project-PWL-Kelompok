@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Polling Mata Kuliah</h1>
  </div> 
  <div class="perwalian-logo">
    <img src="/img/perwalian.png" alt="">
  </div>
  <div class="list-dashboard">
    <div class="padding-list">
      <h6>Gagal polling dapat dikarenakan:</h6>
      <ul>
          <li>Di luar jadwal yang ditentukan</li>
          <li>Kewajiban keuangan mahasiswa belum terpenuhi</li>
          <li>Tidak terdaftar sebagai mahasiswa aktif</li>
          <li>Belum mengembalikan pinjaman buku</li>
      </ul>  
    </div>
  </div>

@endsection