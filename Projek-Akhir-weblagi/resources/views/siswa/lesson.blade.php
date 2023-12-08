@extends('siswa.main')

@section('content')

<style>
    /* Tambahkan CSS untuk mempercantik tampilan */
    .container {
        padding: 20px;
        margin: auto;
    }

    .card {
        margin-bottom: 20px;
    }

    /* Atur warna latar belakang dan teks untuk judul dan teks kartu */
    .card-title {
        background-color: #e6dacf;
        color: #432105;
        padding: 10px;
    }

    .card-body {
        padding: 20px;
    }

    /* Tambahkan beberapa ruang untuk memisahkan elemen */
    .mt-4 {
        margin-top: 20px;
    }

    /* Atur ukuran huruf dan warna untuk teks judul dan teks konten */
    h2 {
        color: #432105;
    }

    /* Atur gaya untuk tombol Go to Lesson */
    .btn-p {
        background-color: #7D7C7C;
    }

    /* Atur warna teks tombol agar terlihat kontras dengan latar belakangnya */
    .btn-p:hover {
        color: #e8d7bb;
    }
</style>
<div class="container mt-4">
    @if ($course)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Course Contents</h2>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->nama }}</h5>
                    </div>
                </div>

                <div class="mt-4">
                    <h2>Lesson Contents</h2>
                    @forelse($contents as $content)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4 class="card-title">{{ $content->judul }}</h4>
                                <p class="card-text">{{ $content->materi }}</p>
                                <a href="{{ route('siswa.lesson.content', ['course' => $course->id, 'content' => $content->id]) }}"
                                    class="btn btn-p">Go to Lesson</a>
                            </div>
                        </div>
                    @empty
                        <p>No contents available for this course.</p>
                    @endforelse
                </div>
            </div>
        </div>
    @else
        <p>No course found.</p>
    @endif
</div>
@endsection
