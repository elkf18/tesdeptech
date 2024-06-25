@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Daftar Siswa
                        <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm float-right">Tambah siswa</a>

                    </div>


                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Induk</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>
                                            <a href="{{ route('siswa.show', ['id' => $siswa->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('siswa.destroy', ['id' => $siswa->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
