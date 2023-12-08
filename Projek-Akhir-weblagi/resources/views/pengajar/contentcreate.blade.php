@extends('pengajar.main')

@section('content')
<style>
    .card {
        max-width: 600px; /* Set your desired maximum width */
        max-height: 600px; /* Set your desired maximum height */
        margin: 20px auto; /* Center the card */
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        color: #432105;
        padding: 10px;
        border-radius: 5px 5px 0 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #7D7C7C;
        color: #fff;
        padding: 6px 30px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #A8A196;
    }
</style>

    <div class="card">
        <div class="card-header">
            <h3>Form Tambah Course</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="course_id">Pilih Course</label>
                    <select name="course_id" class="form-control">
                        @foreach ($contents as $course)
                            <option value="{{ $course->id }}">{{ $course->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                </div>
                <div class="form-group">
                    <label for="materi">Materi</label>
                    <textarea name="materi" id="materi" class="form-control" rows="5">{{ old('materi') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
