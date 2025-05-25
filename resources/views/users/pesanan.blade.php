@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jenis Tas</h1>
            
        </div>
        @if (session('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Success')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('Successs'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Successs')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('Successss'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Successss')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    
        <form action="{{url('/buat-pesanan-tas-custom')}}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="users_id" value="{{$user->id}}">
            <input type="hidden" name="tanggal_pesan" value="{{$tanggalHariIni}}">
            <input type="hidden" name="status" value="Menunggu">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pesanan tas Custom</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Jenis Tas</label>
                                <select class="form-select text-secondary" name="jenis_tas" required>
                                    <option selected>Pilih jenis tas...</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Besar">Besar</option>
                                    <option value="Super">Super</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Bahan Luar</label>
                                <select class="form-select text-secondary" name="bahan_luar" required>
                                    <option selected>Pilih bahan luar...</option>
                                    <option value="Kain polyester D anti air">Kain polyester D anti air</option>
                                    <option value="Terpal swallow biru">Terpal swallow biru</option>
                                    <option value="Terpal truk anti air">Terpal truk anti air</option>
                                    <option value="Terpal truk super">Terpal truk super</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Bahan Tengah</label>
                                <select class="form-select text-secondary" name="bahan_tengah" required>
                                    <option selected>Pilih bahan tengah...</option>
                                    <option value="Spon anti air">Spon anti air</option>
                                    <option value="Spon khusus">Spon khusus</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Bahan Dalam</label>
                                <select class="form-select text-secondary" name="bahan_dalam" required>
                                    <option selected>Pilih bahan dalam...</option>
                                    <option value="Terpal swallow biru">Terpal swallow biru</option>
                                    <option value="Terpal truk anti air warna hijau">Terpal truk anti air warna hijau</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Jenis Bahan</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="jenis_bahan" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Warna Bahan</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="warna_bahan" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">List Tas</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="list_tas" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="exampleInputText1">Ukuran Tas Khusus</label>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Panjang Tas (cth *Panjang Tas: 10cm)</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="ukuran_tas_khusus[]" value="Panjang Tas: " required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Lebar Tas (cth *Lebar Tas: 10cm)</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="ukuran_tas_khusus[]" value="Lebar Tas: " required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Tinggi Tas (cth *Tinggi Tas: 10cm)</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="ukuran_tas_khusus[]" value="Tinggi Tas: " required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Lebar Jok Motor (cth *Lebar Jok Motor: 10cm)</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="ukuran_tas_khusus[]" value="Lebar Jok Motor: " required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Catatan</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="catatan">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Buat Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>

    </div>
    <!-- /.container-fluid -->
@endsection

<form action="{{url('/tambah-jenis-tas')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Tas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Ukuran Tas</label>
                <input type="text" class="form-control" id="exampleInputText1" name="ukuran_tas" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Gambar</label>
                <input type="file" class="form-control" id="" name="gambar" required>
            </div>
              
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Spesifikasi</label>
                <textarea name="spesifikasi" id="" cols="50" rows="10" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

