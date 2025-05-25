<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTas;

class JenisTasController extends Controller
{
    public function jenis_tas_admin()
    {
        $jta = JenisTas::all();
        return view('admin.jenis_tas',compact('jta'));
    }

    public function tambah_jenis_tas(Request $request)
    {
        $this->validate($request,[
            'ukuran_tas' => 'required',
            'gambar' => 'required',
            'spesifikasi' => 'required',
         
        ]);

        $file = $request->file('gambar');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $tujuan_upload = 'photos';
        $file->move($tujuan_upload,$nama_file);

        JenisTas::create([
            'ukuran_tas' => $request->ukuran_tas, 
            'gambar' => $nama_file,
            'spesifikasi' => $request->spesifikasi,
        ]);

        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function edit_jenis_tas(Request $request, $id)
    {
        $this->validate($request, [
            'ukuran_tas' => 'required',
            'spesifikasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $jenisTas = JenisTas::findOrFail($id);
    
        // Jika ada gambar baru di-upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $tujuan_upload = 'photos';
            $file->move($tujuan_upload, $nama_file);
    
            // Hapus gambar lama jika ada
            $gambar_lama = public_path('photos/'.$jenisTas->gambar);
            if (file_exists($gambar_lama)) {
                unlink($gambar_lama);
            }
    
            // Update dengan gambar baru
            $jenisTas->gambar = $nama_file;
        }
    
        $jenisTas->ukuran_tas = $request->ukuran_tas;
        $jenisTas->spesifikasi = $request->spesifikasi;
        $jenisTas->save();
        
        return redirect()->back()->with('Successs', 'Data berhasil diubah!');
    }

    public function jenis_tas_users()
    {
        $jta = JenisTas::all();
        return view('users.jenis_tas',compact('jta'));
    }
}
