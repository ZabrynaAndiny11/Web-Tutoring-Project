@extends('pengajar.main')

@section('content')

<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        overflow: hidden;
    }

    .card-header {
        color: #492a01;
        border-bottom: none;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        text-align: center;
        /* background-color: #BBAB8C;  */
        color: #492a01; /* Warna teks header */
    }

    .card-body {
        padding: 15px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .form-group button {
        background-color: #BBAB8C;
        color: #fff;
        border: none;
        padding: 10px 20px; /* Sesuaikan ukuran padding */
        border-radius: 5px;
        cursor: pointer;
        width: 30%; /* Agar tombol mengisi lebar penuh form-group */
    }

    .form-group button:hover {
        background-color: #A8A196;
    }

</style>


<div class="row">
    <div class="col-lg-8">
        @if (session('message'))
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Form Edit Course</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Course</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $course->nama) }}">
                    </div>
                    <div class="form-group">
                        <label for="mulai">Tanggal Mulai</label>
                        <input type="date" name="mulai" class="form-control" value="{{ old('mulai', $course->mulai) }}">
                    </div>
                    <div class="form-group">
                        <label for="selesai">Tanggal Selesai</label>
                        <input type="date" name="selesai" class="form-control" value="{{ old('selesai', $course->selesai) }}">
                    </div>
                    <div class="form-group">
                        <label for="pengajar">Pengajar</label>
                        <input type="text" name="pengajar" class="form-control" value="{{ old('pengajar', $course->pengajar) }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $course->deskripsi) }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Form Edit Gambar</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('course.updateImage', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <img src="{{ Storage::url($course->gambar) }}" class="img-fluid" alt="">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
