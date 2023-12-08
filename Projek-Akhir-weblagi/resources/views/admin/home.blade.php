@extends('admin')

@section('content')

<div class="container mt-4" style="color: #492a01">
        <div>
            <h2>Welcome to Admin Dashboard</h2> <hr>
        </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5 justify-content-center">
    @foreach ($courses->take(10) as $course)
        <div class="col">
            <div class="card custom-card-color">
                <img src="{{ Storage::url($course->gambar) }}" class="card-img-top" alt="{{ $course->nama }}"
                    width="100%" height="300">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ $course->nama }}</h5>
                    <p class="card-text">{{ $course->deskripsi }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
