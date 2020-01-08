<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Ruangan;
use App\Barang;
use App\Pengadu;

class DashboardController extends Controller
{
    public function index(){

        $pengaduan = Pengaduan::count();
        $ruangan = Ruangan::count();
        $barang = Barang::count();
        $pengadu = Pengadu::count();
        return view('master.dashboard', compact('pengaduan', 'barang', 'ruangan', 'pengadu'));

    }
}
