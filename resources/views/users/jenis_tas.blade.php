@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jenis Tas</h1>
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
    
        @foreach ($jta as $item)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$item->ukuran_tas}}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"><img src="{{ url('/photos/'.$item->gambar)}}" width="100%"></div>
                    <div class="col-md-6">
                        <p>{{$item->spesifikasi}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

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

