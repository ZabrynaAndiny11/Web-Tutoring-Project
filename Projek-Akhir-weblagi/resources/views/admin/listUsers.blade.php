@extends('admin')

@section('content')
<style>
    thead tr th {
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    tbody tr td {
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .card {
    margin-top: 20px;
}

.table-responsive {
    margin-top: 20px;
}

.alert {
    margin-top: 20px;
}

.created-by-me {
    background-color: #f0f0f0; /* Light gray background for rows created by the current user */
}

</style>

<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center" style="color: #432105">
        <h2>User Management</h2>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        {{-- Check if the user has the 'admin' role --}}
                        @if($user->role !== 'admin')
                            <tr class="{{ auth()->id() === $user->user_id ? 'created-by-me' : '' }}">
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">
                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus data?');"
                                        class="d-inline" action="{{ route('admin.user.delete', $user->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
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
