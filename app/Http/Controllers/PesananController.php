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
        $id = Pesanan::count('id');
        // dd($id);
        $tanggalHariIni = Carbon::now()->format('Ymd');
        return view('users.pesanan', compact('tanggalHariIni', 'user', 'id'));
    }

    public function tambah_alamat(Request $request, $id)
    {
        Users::where('id', $id)->update([
            'alamat' => $request->alamat,
        ]);
        return redirect()->back()->with('Succes', 'Alamat berhasil ditambahkan!');
    }

    public function buat_pesanan(Request $request)
        {
        $save = new Pesanan;
        $save->users_id = $request->users_id;
        $save->jenis_tas = $request->jenis_tas; 
        $save->no_pesanan = $request->no_pesanan;
        $save->bahan_luar = $request->bahan_luar;
        $save->bahan_tengah = $request->bahan_tengah; 
        $save->bahan_dalam = $request->bahan_dalam; 
        $save->ukuran_tas_khusus = implode(', ', $request->ukuran_tas_khusus);
        // $save->jenis_bahan = $request->jenis_bahan; 
        $save->warna_bahan = $request->warna_bahan; 
        $save->list_tas = $request->list_tas; 
        $save->catatan = $request->catatan; 
        $save->tanggal_pesan = $request->tanggal_pesan;
        $save->pengiriman = $request->pengiriman;  
        $save->status = $request->status; 
        $save->save(); 
    
            return redirect()->back()->with('Success', 'Data berhasil disimpan!');
        }

    public function pesanan_saya()
    {
        $user = auth()->id();
        $id = Pesanan::count('id');
        // dd($id);
        $tanggalHariIni = Carbon::now()->format('Ymd');
        $ps = Pesanan::where('users_id', $user)->orderBy('id', 'desc')->get();
        return view('users.pesanan_saya', compact('ps', 'user', 'tanggalHariIni', 'id'));
        
    }

    public function kelola_pesanan()
    {
        $ps = Pesanan::orderBy('id', 'desc')->get();
        return view('admin.pesanan', compact('ps'));
        
    }

    public function terima_pesanan(Request $request, $id)
    {

        Pesanan::where('id', $id)->update([
            'status' => 'Menunggu Pembayaran',
            'subtotal' => str_replace('.','',$request->subtotal),
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function pembayaran(Request $request, $id)
    {
        $file = $request->file('bukti_pembayaran');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $tujuan_upload = 'photos';
        $file->move($tujuan_upload,$nama_file);

        $jenisTas = Pesanan::findOrFail($id);

        $jenisTas->status = 'Diproses';
        $jenisTas->bukti_pembayaran = $nama_file;
        $jenisTas->save();

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
