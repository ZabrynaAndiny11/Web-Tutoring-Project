@extends('siswa.siswa')

@section('content')

<style>

    .container {
        max-width: 900px; /* Lebar maksimum kontainer */
        margin-bottom: 40px;
    }

    .card {
        margin-top: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan kartu */
        background-color: #e8e1d8cc;
    }

    .card-title {
        color: #432105; /* Warna judul kartu */
        /* text-align: center; */
    }

    /* label {
        font-weight: bold;
    } */


    .btn-primary {
        background-color: #7D7C7C; /* Warna latar belakang tombol */
        border: none;
    }

    .btn-primary:hover {
        background-color: #A8A196; /* Warna latar belakang tombol saat dihover */
    }
</style>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Profile Siswa</h2>
            <form action="{{ route('siswa.profile.update') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
