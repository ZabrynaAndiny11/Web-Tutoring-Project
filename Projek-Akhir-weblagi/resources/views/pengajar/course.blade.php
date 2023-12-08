@extends('pengajar.main')

@section('content')
<style>
    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        overflow: hidden;
    }

    .card-header {
        /* background-color: #BBAB8C; */
        color: #492a01;
        border-bottom: none;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body {
        padding: 20px;
    }

    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .table th {
        background-color: #BBAB8C;
        color: #fff;
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tr.created-by-me {
        background-color: #e8e1d8cc; /* Warna latar belakang untuk course yang dibuat oleh pengajar tersebut */
    }

    .btn-primary {
        background-color: #BBAB8C;
        border: none;
    }

    .btn-primary:hover {
        background-color: #A8A196;
    }

    .btn-warning,
    .btn-danger {
        color: #fff;
    }

    .btn-warning:hover {
        background-color: #ffc107; /* Warna latar belakang tombol Edit saat dihover */
    }

    .btn-danger:hover {
        background-color: #dc3545; /* Warna latar belakang tombol Delete saat dihover */
    }
</style>

<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Course Management</h3>
        <a href="{{ route('course.create') }}" class="btn btn-primary">Tambah Course</a>
    </div>
    <div class="card-body">
        @if (session('message'))
        <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="align-middle">
                    <tr>
                        <th>No</th>
                        <th>Nama Course</th>
                        <th>Rentang course</th>
                        <th>Pengajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr class="{{ auth()->id() === $course->user_id ? 'created-by-me' : '' }}">
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $course->nama }}</td>
                            <td class="align-middle">{{ $course->mulai }} - {{ $course->selesai }}</td>
                            <td class="align-middle">{{ $course->pengajar }}</td>
                            <td class="align-middle">
                                {{-- <a class="btn btn-sm btn-primary" href="{{ route('recruter.detail', ['courseId' => $course->id]) }}">Detail</a> --}}
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form onclick="return confirm('Apakah anda yakin ingin menghapus data?');"
                                    class="d-inline" action="{{ route('course.destroy', $course->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
