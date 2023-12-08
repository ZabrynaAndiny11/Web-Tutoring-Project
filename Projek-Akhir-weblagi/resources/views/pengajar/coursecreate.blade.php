@extends('pengajar.main')

@section('content')
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        overflow: hidden;
        max-width: 700px;
        margin: auto;
    }

    .card-header {
        color: #492a01;
        border-bottom: none;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        text-align: center;
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
        border-radius: 10px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    .btn-p {
    background-color: #BBAB8C;
    color: #fff;
    border: none;
    padding: 8px 65px; /* Sesuaikan nilai padding sesuai keinginan Anda */
    border-radius: 20px;
    cursor: pointer;
}

.btn-p:hover {
    background-color: #A8A196;
}

</style>

<div class="card">
    <div class="card-header">
        <h3>Form Tambah Course</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Course</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            </div>
            <div class="form-group">
                <label for="mulai">Tanggal Mulai</label>
                <input type="date" name="mulai" class="form-control" value="{{ old('mulai') }}">
            </div>
            <div class="form-group">
                <label for="selesai">Tanggal Selesai</label>
                <input type="date" name="selesai" class="form-control" value="{{ old('selesai') }}">
            </div>
            <div class="form-group">
                <label for="pengajar">Pengajar</label>
                <input type="text" name="pengajar" class="form-control" value="{{ old('pengajar') }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-p">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
