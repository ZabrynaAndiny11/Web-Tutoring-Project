@extends('siswa.main')

@section('content')
<div class="container" style="color: #492a01">
    <h2>{{ $course->nama }} - Lesson Content</h2>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $content->judul }}</h5>
            <p>{{ $content->materi }}</p>
        </div>
    </div>
</div>
@endsection
