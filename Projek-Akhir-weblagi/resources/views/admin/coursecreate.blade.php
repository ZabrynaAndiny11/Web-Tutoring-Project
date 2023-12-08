@extends('admin')

@section('content')

<style>
    /* Add your custom styles here */

.card {
    margin-top: 20px;
}

.card-header {
    padding: 1rem;
}

.form-group {
    margin-bottom: 20px;
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
    <div class="card-header" style="color: #492a01">
        <h3>Form Tambah Course</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
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
