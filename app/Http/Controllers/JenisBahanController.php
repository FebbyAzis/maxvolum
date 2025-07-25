<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBahan;

class JenisBahanController extends Controller
{
    public function jenis_bahan_admin()
    {
        $jta = JenisBahan::all();
        return view('admin.jenis_bahan',compact('jta'));
    }

    public function tambah_jenis_bahan(Request $request)
    {
        $this->validate($request,[
            'nama_bahan' => 'required',
            'gambar' => 'required',
            'spesifikasi' => 'required',
         
        ]);

        $file = $request->file('gambar');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $tujuan_upload = 'photos';
        $file->move($tujuan_upload,$nama_file);

        JenisBahan::create([
            'nama_bahan' => $request->nama_bahan, 
            'gambar' => $nama_file,
            'spesifikasi' => $request->spesifikasi,
        ]);

        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function edit_jenis_bahan(Request $request, $id)
    {
        $this->validate($request, [
            'nama_bahan' => 'required',
            'spesifikasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $JenisBahan = JenisBahan::findOrFail($id);
    
        // Jika ada gambar baru di-upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $tujuan_upload = 'photos';
            $file->move($tujuan_upload, $nama_file);
    
            // Hapus gambar lama jika ada
            $gambar_lama = public_path('photos/'.$JenisBahan->gambar);
            if (file_exists($gambar_lama)) {
                unlink($gambar_lama);
            }
    
            // Update dengan gambar baru
            $JenisBahan->gambar = $nama_file;
        }
    
        $JenisBahan->nama_bahan = $request->nama_bahan;
        $JenisBahan->spesifikasi = $request->spesifikasi;
        $JenisBahan->save();
        
        return redirect()->back()->with('Successs', 'Data berhasil diubah!');
    }

    public function jenis_bahan_users()
    {
        $jta = JenisBahan::all();
        return view('users.jenis_bahan',compact('jta'));
    }
}
