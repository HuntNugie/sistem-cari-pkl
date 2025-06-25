@extends('layout.public.public')

@push('style')
<style>
    body{
        background-image: url('../profile.jpg')
    }
  .profile-card {
    background-color: #1e1e2f;
    color: #ffffff;
    border-radius: 15px;
    padding: 30px;
    max-width: 700px;
    margin: auto;
    box-shadow: 0 0 15px rgba(0,0,0,0.4);
  }

  .profile-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
  }

  .profile-header img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #ff6600;
  }

  .profile-title h2 {
    margin: 0;
    color: #ff6600;
  }

  .info-label {
    font-weight: bold;
    color: #cccccc;
  }

  .info-value {
    color: #ffffff;
  }

  .btn-orange {
    background-color: #ff6600;
    color: white;
  }

  .btn-orange:hover {
    background-color: #e65c00;
  }
</style>
@endpush

@section('content')
<div style="margin-top: 5rem">

<div class="container py-5">
  <div class="profile-card">
    <div class="profile-header">
      <img src="https://media.istockphoto.com/id/1485546774/id/foto/pria-botak-tersenyum-ke-kamera-berdiri-dengan-tangan-disilangkan.jpg?s=612x612&w=0&k=20&c=hzlkB5Rs5GS080SS5QU9e3pzweE4CIdRjbaMK-G25XQ=" alt="User Photo">
      <div class="profile-title">
        <h2>{{ auth()->user()->name }}</h2>
        <p class="text-muted mb-0">Siswa SMK</p>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-sm-4 info-label">Email</div>
      <div class="col-sm-8 info-value"> {{ auth()->user()->email }} </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-4 info-label">Kelas</div>
      <div class="col-sm-8 info-value"> XII RPL 1 </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-4 info-label">Asal Sekolah</div>
      <div class="col-sm-8 info-value">?? SMK Negeri 1 Contoh </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-4 info-label">Nomor Telepon</div>
      <div class="col-sm-8 info-value"> 085157933682 </div>
    </div>
    <div class="row mb-4">
      <div class="col-sm-4 info-label">Alamat</div>
      <div class="col-sm-8 info-value">Perumahan bumi sangkuariang 4</div>
    </div>

    <div class="text-end">
      <a href="#" class="btn btn-orange">Edit Profil</a>
    </div>
  </div>
</div>
</div>
@endsection
