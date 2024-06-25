@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Ekstrakulikuler</div>

                    <div class="card-body">
                        <form action="{{ route('ekstrakulikuler.update', ['siswa_id' => $siswa->id, 'ekstrakulikuler_id' => $ekstrakulikuler->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nama_ekstrakulikuler" class="col-md-4 col-form-label text-md-right">Nama Ekstrakulikuler</label>
                                <div class="col-md-6">
                                    <input id="nama_ekstrakulikuler" type="text" class="form-control @error('nama_ekstrakulikuler') is-invalid @enderror" name="nama_ekstrakulikuler" value="{{ old('nama_ekstrakulikuler', $ekstrakulikuler->nama_ekstrakulikuler) }}" required autocomplete="nama_ekstrakulikuler" autofocus>
                                    @error('nama_ekstrakulikuler')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tahun_mulai" class="col-md-4 col-form-label text-md-right">Tahun Mulai</label>
                                <div class="col-md-6">
                                    <input id="tahun_mulai" type="number" class="form-control @error('tahun_mulai') is-invalid @enderror" name="tahun_mulai" value="{{ old('tahun_mulai', $ekstrakulikuler->tahun_mulai) }}" required autocomplete="tahun_mulai">
                                    @error('tahun_mulai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                    <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
