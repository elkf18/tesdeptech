<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // Menampilkan daftar siswa
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', ['siswas' => $siswas]);
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'no_hp' => 'required|string',
            'nis' => 'required|string|unique:siswas',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto');
            $filename = str_replace('public/', '', $path);
        } else {
            $filename = null;
        }

        Siswa::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $filename,
        ]);

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil ditambahkan');
    }

    // Menampilkan detail siswa
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.detail', ['siswa' => $siswa]);
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    // Menyimpan perubahan pada data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'no_hp' => 'required|string',
            'nis' => 'required|string|unique:siswas,nis,'.$id,
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // contoh validasi foto
        ]);

        $siswa = Siswa::find($id);
        $siswa->nama_depan = $request->nama_depan;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->no_hp = $request->no_hp;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                Storage::delete('public/' . $siswa->foto);
            }
            $path = $request->file('foto')->store('public/foto');
            $filename = str_replace('public/', '', $path);
            $siswa->foto = $filename;
        }

        $siswa->save();

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil diperbarui');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        // Hapus foto jika ada
        if ($siswa->foto) {
            Storage::delete('public/' . $siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil dihapus');
    }
        public function createEkstrakulikuler($siswa_id)
    {
        $siswa = Siswa::find($siswa_id);
        return view('ekstrakulikuler.create', ['siswa' => $siswa]);
    }

    public function storeEkstrakulikuler(Request $request, $siswa_id)
    {
        $request->validate([
            'nama_ekstrakulikuler' => 'required|string',
            'tahun_mulai' => 'required|integer',
        ]);

        $siswa = Siswa::find($siswa_id);

        $siswa->ekstrakulikulers()->create([
            'nama_ekstrakulikuler' => $request->nama_ekstrakulikuler,
            'tahun_mulai' => $request->tahun_mulai,
        ]);

        return redirect()->route('siswa.show', $siswa_id)
                        ->with('success', 'Data ekstrakulikuler berhasil ditambahkan');
    }

    public function editEkstrakulikuler($siswa_id, $ekstrakulikuler_id)
    {
        $siswa = Siswa::find($siswa_id);
        $ekstrakulikuler = Ekstrakulikuler::find($ekstrakulikuler_id);
        
        if (!$ekstrakulikuler) {
            return redirect()->route('siswa.show', $siswa_id)
                             ->with('error', 'Ekstrakulikuler not found');
        }

        return view('ekstrakulikuler.edit', ['siswa' => $siswa, 'ekstrakulikuler' => $ekstrakulikuler]);
    }

    // Menyimpan perubahan pada data ekstrakulikuler
    public function updateEkstrakulikuler(Request $request, $siswa_id, $ekstrakulikuler_id)
    {
        $request->validate([
            'nama_ekstrakulikuler' => 'required|string',
            'tahun_mulai' => 'required|integer',
        ]);

        $siswa = Siswa::find($siswa_id);
        $ekstrakulikuler = Ekstrakulikuler::find($ekstrakulikuler_id);
        
        if (!$ekstrakulikuler) {
            return redirect()->route('siswa.show', $siswa_id)
                             ->with('error', 'Ekstrakulikuler not found');
        }

        $ekstrakulikuler->nama_ekstrakulikuler = $request->nama_ekstrakulikuler;
        $ekstrakulikuler->tahun_mulai = $request->tahun_mulai;
        $ekstrakulikuler->save();

        return redirect()->route('siswa.show', $siswa_id)
                        ->with('success', 'Data ekstrakulikuler berhasil diperbarui');
    }
    public function destroyEkstrakulikuler($siswa_id, $ekstrakulikuler_id)
{
    $siswa = Siswa::find($siswa_id);

    // Find the specific ekstrakulikuler by id
    $ekstrakulikuler = $siswa->ekstrakulikulers()->find($ekstrakulikuler_id);

    if (!$ekstrakulikuler) {
        return redirect()->route('siswa.show', $siswa_id)
                         ->with('error', 'Ekstrakulikuler not found');
    }

    $ekstrakulikuler->delete();

    return redirect()->route('siswa.show', $siswa_id)
                     ->with('success', 'Ekstrakulikuler deleted successfully');
}



}
