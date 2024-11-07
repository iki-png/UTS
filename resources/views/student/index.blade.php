@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">Daftar Mahasiswa</h5>
                </div>

                <div class="card-body">
                    <!-- Tombol Tambah Data -->
                    <div class="mb-3">
                        <a href="{{ route('students.create') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tempat Lahir</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $s)
                            <tr>
                                <td class="text-center">{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                                <td class="text-center">{{ $s->nim }}</td>
                                <td class="text-center">{{ $s->name }}</td>
                                <td class="text-center">{{ $s->tempat_lahir }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <!-- Show Button -->
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#studentModal{{ $s->id }}">
                                        <i class="fas fa-eye"></i> Show
                                    </button>

                                    <!-- Modal Show -->
                                    <div class="modal fade" id="studentModal{{ $s->id }}" tabindex="-1" aria-labelledby="studentModalLabel{{ $s->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentModalLabel{{ $s->id }}">Detail Mahasiswa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <!-- Gambar Profil -->
                                                    @if ($s->profile_image)
                                                        <img src="{{ asset('storage/' . $s->profile_image) }}" class="img-fluid rounded-circle" alt="Profile Image" style="width: 150px; height: 150px; object-fit: cover;">
                                                    @else
                                                        <i class="fas fa-user-circle" style="font-size: 100px;"></i>
                                                    @endif

                                                    <div class="mt-3">
                                                        <strong>Nama:</strong> {{ $s->name }} <br>
                                                        <strong>NIM:</strong> {{ $s->nim }} <br>
                                                        <strong>Kelas:</strong> {{ $s->kelas }} <br>
                                                        <strong>Tempat Lahir:</strong> {{ $s->tempat_lahir }} <br>
                                                        <strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('students.edit', $s->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('students.destroy', $s->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
