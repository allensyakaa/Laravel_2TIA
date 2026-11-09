
@extends('layouts.admin.app')

@section('content')

<div class="py-4">
    <h1 class="h4">Edit User</h1>
    <p>Form untuk mengedit data user.</p>

    <a href="{{ route('user.index') }}" class="btn btn-primary mb-3">
        Kembali
    </a>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">

                <form action="{{ route('user.update', $dataUser->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $dataUser->name) }}"
                            required
                        >
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $dataUser->email) }}"
                            required
                        >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Kosongkan jika tidak diubah"
                        >
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Ulangi password baru"
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('user.index') }}"
                       class="btn btn-outline-secondary">
                        Batal
                    </a>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
