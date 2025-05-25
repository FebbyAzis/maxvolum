<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function dashboard_admin()
    {
        return view('admin.dashboard');
    }

    public function dashboard_users()
    {
        return view('users.dashboard');
    }

    public function cetak()
    {
      
        return view('admin.cetak');
    }

    public function cetak_laporan($tglawal, $tglakhir)
    {
        $cl = Pesanan::whereDate('created_at', '>=', $tglawal)
        ->whereDate('created_at', '<=', $tglakhir)->orderBy('id', 'desc')->get();

        return view('admin.cetak_laporan', compact('cl', 'tglawal', 'tglakhir'));
    }

    public function laporan()
    {
        $l = Pesanan::orderBy('id', 'desc')->get();
        return view('admin.laporan', compact('l'));
    }
    
}
