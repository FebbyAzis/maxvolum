@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cetak</h1>
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
    
    
        
        
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Cetak Laporan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tglawal" name="tglawal" placeholder="Masukan tanggal awal" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tglakhir" name="tglakhir" placeholder="Masukan tanggal awal" required>
                            </div>
                            <div class="col-sm-12 text-right">
                                <a href=""
                                onclick="this.href='/cetak-laporan/'+document.getElementById('tglawal').value+'/'+document.getElementById('tglakhir').value"
                                target="_blank" class="btn btn-primary text-right">Cetak Laporan</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
 
    


    </div>
    <!-- /.container-fluid -->
@endsection
