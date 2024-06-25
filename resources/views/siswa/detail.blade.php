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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
