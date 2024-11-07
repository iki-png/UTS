@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <!-- Header: Menampilkan Nama Mahasiswa -->
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">{{ __('Edit Student: ') . $student->name }}</h5>
                </div>

                <div class="card-body">
                    <!-- Form Edit Student -->
                    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Method PUT digunakan untuk update -->

                        <!-- Input Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nama') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input NIM -->
                        <div class="mb-3">
                            <label for="nim" class="form-label">{{ __('NIM') }}</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $student->nim) }}" required>
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Kelas -->
                        <div class="mb-3">
                            <label for="kelas" class="form-label">{{ __('Kelas') }}</label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas', $student->kelas) }}" required>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Tempat Lahir -->
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">{{ __('Tempat Lahir') }}</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $student->tempat_lahir) }}" required>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Tanggal Lahir -->
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">{{ __('Tanggal Lahir') }}</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($student->tanggal_lahir)->format('Y-m-d')) }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Foto Profil -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">{{ __('Foto Profil') }}</label>
                            <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image" accept="image/*">
                            
                            @if ($student->profile_image)
                                <div class="mt-3 text-center">
                                    <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%; border: 2px solid #ddd;">
                                </div>
                            @endif

                            @error('profile_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin memperbarui data mahasiswa ini?')">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
