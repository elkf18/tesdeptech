@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Siswa</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                            <div class="col-md-6">
                                <p>{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nis" class="col-md-4 col-form-label text-md-right">Nomor Induk Siswa</label>
                            <div class="col-md-6">
                                <p>{{ $siswa->nis }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-right">Nomor HP</label>
                            <div class="col-md-6">
                                <p>{{ $siswa->no_hp }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                            <div class="col-md-6">
                                <p>{{ $siswa->alamat }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>
                            <div class="col-md-6">
                                <p>{{ $siswa->jenis_kelamin }}</p>
                            </div>
                        </div>

                        @if ($siswa->foto)
                            <div class="form-group row">
                                <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" style="max-width: 200px;">
                                </div>
                            </div>
                        @endif

                        <hr>

                        <h4>Ekstrakulikuler</h4>

                        <table class="table">
                            <thead>
                                <tr >
                                    <th>Nama Ekstrakulikuler</th>
                                    <th>Tahun Mulai</th>
                                    <th  class="d-flex justify-content-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa->ekstrakulikulers as $ekstrakulikuler)
                                    <tr>
                                        <td>{{ $ekstrakulikuler->nama_ekstrakulikuler }}</td>
                                        <td>{{ $ekstrakulikuler->tahun_mulai }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('ekstrakulikuler.edit',['siswa_id' => $siswa->id, 'ekstrakulikuler_id' => $ekstrakulikuler->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('ekstrakulikuler.destroy', ['siswa_id' => $siswa->id, 'ekstrakulikuler_id' => $ekstrakulikuler->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('ekstrakulikuler.create', ['siswa_id' => $siswa->id]) }}" class="btn btn-primary">Tambah Ekstrakulikuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
