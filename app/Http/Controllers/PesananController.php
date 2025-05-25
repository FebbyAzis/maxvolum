<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PesananController extends Controller
{
    public function pesanan_users()
    {
        $user = Auth::user();
        $tanggalHariIni = Carbon::now()->format('Y-m-d');
        return view('users.pesanan', compact('tanggalHariIni', 'user'));
    }

    public function buat_pesanan(Request $request)
        {
        $save = new Pesanan;
        $save->users_id = $request->users_id;
        $save->jenis_tas = $request->jenis_tas; 
        $save->bahan_luar = $request->bahan_luar;
        $save->bahan_tengah = $request->bahan_tengah; 
        $save->bahan_dalam = $request->bahan_dalam; 
        $save->ukuran_tas_khusus = implode(', ', $request->ukuran_tas_khusus);
        $save->jenis_bahan = $request->jenis_bahan; 
        $save->warna_bahan = $request->warna_bahan; 
        $save->list_tas = $request->list_tas; 
        $save->catatan = $request->catatan; 
        $save->tanggal_pesan = $request->tanggal_pesan; 
        $save->status = $request->status; 
        $save->save(); 
    
            return redirect()->back()->with('Success', 'Data berhasil disimpan!');
        }

    public function pesanan_saya()
    {
        $user = auth()->id();
        
        $ps = Pesanan::where('users_id', $user)->orderBy('id', 'desc')->get();
        return view('users.pesanan_saya', compact('ps', 'user'));
        
    }

    public function kelola_pesanan()
    {
        $ps = Pesanan::orderBy('id', 'desc')->get();
        return view('admin.pesanan', compact('ps'));
        
    }

    public function terima_pesanan($id)
    {

        Pesanan::where('id', $id)->update([
            'status' => 'Diproses',
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function pesanan_selesai($id)
    {

        Pesanan::where('id', $id)->update([
            'status' => 'Selesai',
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }
}
