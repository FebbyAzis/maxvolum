@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jenis Bahan</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Jenis Bahan</a>
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
        @foreach ($jta as $item)
        <div class="col-sm-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    
                        <h5 class="m-0 font-weight-bold text-primary">{{$item->nama_bahan}}</h5>
                </div>
            </div>
            <div class="card-body">
            
                    <div class="col-md-12">  <center><img src="{{ url('/photos/'.$item->gambar)}}" width="70%">   </center>     </div> 
                      <br><hr>
                      <div class="col-sm-12 text-right">
                        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal1{{$item->id}}">
                        Edit
                      </button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3{{$item->id}}">
                        Lihat
                      </button>
                      </div>
                         
                 
            </div>
        </div>
        </div>
        @endforeach
</div>

    </div>
    <!-- /.container-fluid -->
@endsection

<form action="{{url('/tambah-jenis-bahan')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Bahan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Nama Bahan</label>
                <input type="text" class="form-control" id="exampleInputText1" name="nama_bahan" required>
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

@foreach ($jta as $item)
<form action="{{url('edit-jenis-bahan/'. $item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Bahan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Nama Bahan</label>
                <input type="text" class="form-control" id="exampleInputText1" name="nama_bahan" value="{{$item->nama_bahan}}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Gambar saat ini</label>
                <br>
                <img src="{{ url('/photos/'.$item->gambar)}}" width="100%">
            </div>

            <div class="form-group">
                
                <label class="form-label" for="exampleInputText1">Ganti gambar</label>
                <input type="file" class="form-control" name="gambar" >
                
            </div>
              
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Spesifikasi</label>
                <textarea name="spesifikasi" id="" cols="50" rows="10" required>{{$item->spesifikasi}}</textarea>
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
@endforeach

@foreach ($jta as $item)
<div class="modal fade" id="exampleModal3{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$item->nama_bahan}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
        
                    <center><img src="{{ url('/photos/'.$item->gambar)}}" width="70%">   </center>
                    <br><br>
                    <pre>{{$item->spesifikasi}}</pre>
        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                  <button type="submit" class="btn btn-primary">Ya</button>
                </div>
              </div>
            </div>
          </div>
@endforeach