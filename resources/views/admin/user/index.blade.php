
@extends('layouts.admin.app')

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Data User</h1>
            <p class="mb-0">List data seluruh user</p>
        </div>

        <div>
            <a href="{{ route('user.create') }}"
                class="btn btn-success text-white">
                <i class="fas fa-plus me-1"></i>
                Tambah User
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="table-user"
                        class="table table-centered table-nowrap mb-0 rounded">

                        <thead class="thead-light">
                            <tr>
                                <th class="border-0">Name</th>
                                <th class="border-0">Email</th>
                                <th class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($dataUser as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>

                                    <td>
                                        <a href="{{ route('user.edit', $item->id) }}"
                                            class="btn btn-info btn-sm text-white">
                                            <i class="fas fa-edit me-1"></i>
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('user.destroy', $item->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash me-1"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Belum ada data user.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
