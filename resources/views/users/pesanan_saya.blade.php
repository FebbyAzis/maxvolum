@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pesanan Saya</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Buat Pesanan</a>
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
    
        <div class="row">
            @foreach ($ps as $item)
           <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @if ($item->status == 'Menunggu')
                    <h6 class="m-0 font-weight-bold text-warning">Status Pesanan: {{$item->status}}</h6>
                    @elseif($item->status == 'Diproses')
                    <h6 class="m-0 font-weight-bold text-primary">Status Pesanan: {{$item->status}}</h6>
                    @else
                    <h6 class="m-0 font-weight-bold text-success">Status Pesanan: {{$item->status}}</h6>
                    @endif
                    
                    
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Jenis Tas</th>
                            <td>{{$item->jenis_tas}}</td>
                        </tr>
                        <tr>
                            <th>Bahan Luar</th>
                            <td>{{$item->bahan_luar}}</td>
                        </tr>
                        <tr>
                            <th>Bahan Tengah</th>
                            <td>{{$item->bahan_tengah}}</td>
                        </tr>
                        <tr>
                            <th>Bahan Dalam</th>
                            <td>{{$item->bahan_dalam}}</td>
                        </tr>
                        <tr>
                            <th>Ukuran Tas Khusus</th>
                            <td>{{$item->ukuran_tas_khusus}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Bahan</th>
                            <td>{{$item->jenis_bahan}}</td>
                        </tr>
                        <tr>
                            <th>Warna Bahan</th>
                            <td>{{$item->warna_bahan}}</td>
                        </tr>
                        <tr>
                            <th>List Tas</th>
                            <td>{{$item->list_tas}}</td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td>{{$item->catatan}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pesanan</th>
                            <td>{{ date('d/M/Y', strtotime($item->tanggal_pesan)) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
           </div>
            @endforeach
        </div>

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

