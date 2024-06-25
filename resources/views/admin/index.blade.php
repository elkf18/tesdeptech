<!-- resources/views/admin/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Admin
                        <a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm float-right">Tambah Admin</a>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Depan</th>
                                    <th scope="col">Nama Belakang</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->nama_depan }}</td>
                                        <td>{{ $admin->nama_belakang }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->tanggal_lahir }}</td>
                                        <td>{{ $admin->jenis_kelamin }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus admin ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Belum ada data admin.</td>
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
