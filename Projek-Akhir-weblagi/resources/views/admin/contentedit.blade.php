@extends('admin')

@section('content')
<style>
    .card {
        margin: 60px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px;
    }

    .card-header {
        color: #432105;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .btn-p {
        background-color: #7D7C7C;
        color: #fff;
        padding: 6px 30px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-p:hover {
        background-color: #A8A196;
    }

    </style>

<div class="card">
    <div class="card-header">
        <h3>Edit Content</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.content.update', ['content' => $content->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $content->judul }}">
            </div>
            <div class="form-group">
                <label for="materi">Materi</label>
                <textarea name="materi" id="materi" class="form-control" rows="5">{{ $content->materi }}</textarea>
            </div>
            <button type="submit" class="btn btn-p">Update</button>
        </form>
    </div>
</div>
@endsection
