@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">List Siswa dan Ekstrakulikulernya</div>

            <div class="card-body">
                @foreach ($siswas as $siswa)
                    <h4>{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</h4>
                    <ul>
                        @foreach ($siswa->ekstrakulikulers as $ekstrakulikuler)
                            <li>{{ $ekstrakulikuler->nama_ekstrakulikuler }}</li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection
