@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">{{ __('Create Student') }}</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Input Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nama') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input NIM -->
                        <div class="mb-3">
                            <label for="nim" class="form-label">{{ __('NIM') }}</label>
                            <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required>
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Kelas -->
                        <div class="mb-3">
                            <label for="kelas" class="form-label">{{ __('Kelas') }}</label>
                            <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" required>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Tempat Lahir -->
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">{{ __('Tempat Lahir') }}</label>
                            <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Tanggal Lahir -->
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">{{ __('Tanggal Lahir') }}</label>
                            <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Foto Profil -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">{{ __('Foto Profil') }}</label>
                            <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" accept="image/*">
                            @error('profile_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mb-0 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
