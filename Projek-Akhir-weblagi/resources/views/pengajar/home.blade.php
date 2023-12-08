@extends('pengajar.main')

@section('content')
    <div class="container" style="color: #492a01">
        <h2>Welcome to Teacher Dashboard</h2><hr>
        @if (session('message'))
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            @foreach ($courses->take(10) as $course)
                <div class="col">
                    <div class="card custom-card-color">
                        <img src="{{ Storage::url($course->gambar) }}" class="card-img-top" alt="{{ $course->nama }}"
                            width="100%" height="300">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $course->nama }}</h5>
                            <p class="card-text">{{ $course->deskripsi }}</p>
                            <a href="#" class="btn btn-secondary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
