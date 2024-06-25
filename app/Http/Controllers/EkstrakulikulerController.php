<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        // $ekstrakulikulers = Ekstrakulikuler::with('siswas')->get();

        $siswas = Siswa::with('ekstrakulikulers')->get();

        return view('ekstrakulikuler.index', compact('siswas'));
    }
    // public function index()
    // {
        
    //     $ekstrakulikulers = Ekstrakulikuler::all(); // Misalnya Anda mengambil semua ekstrakulikuler dari model Ekstrakulikuler
    //     $siswas = Siswa::with('ekstrakulikulers')->get();

    //     return view('ekstrakulikuler.index', compact('ekstrakulikulers'));
    // }
    // public function index()
    // {
    //     $ekstrakulikulers = Ekstrakulikuler::with('siswas')->get();

    //     return view('ekstrakulikuler.index', compact('ekstrakulikulers'));
    // }
}
