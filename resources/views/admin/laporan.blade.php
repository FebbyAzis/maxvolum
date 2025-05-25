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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Pesanan Tas</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"  style="table-layout: fixed;" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-secondary text-center" style="width: 25px;">No</th>
                            <th class="text-secondary text-center" style="width: 100px;">Nama Pemesan</th>
                            <th class="text-secondary text-center" style="width: 100px;">Tanggal Pesan</th>
                            <th class="text-secondary text-center" style="width: 100px;">Jenis Tas</th>
                            <th class="text-secondary text-center" style="width: 100px;">Bahan Luar</th>
                            <th class="text-secondary text-center" style="width: 100px;">Bahan Tengah</th>
                            <th class="text-secondary text-center" style="width: 100px;">Bahan Dalam</th>
                            <th class="text-secondary text-center" style="width: 150px;">Ukuran Tas Khusus</th>
                            <th class="text-secondary text-center" style="width: 100px;">Jenis Bahan</th>
                            <th class="text-secondary text-center" style="width: 100px;">Warna Bahan</th>
                            <th class="text-secondary text-center" style="width: 100px;">List Tas</th>
                            <th class="text-secondary text-center" style="width: 100px;">Catatan</th>
                            <th class="text-secondary text-center" style="width: 100px;">Status</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($l as $no=>$item)
                            <tr>
                                <td class="text-secondary text-center">{{$no+1}}</td>
                                <td class="text-secondary text-center">{{$item->users->name}}</td>
                                <td class="text-secondary text-center">{{date("d/M/Y", strtotime($item->tanggal_pesan));}}</td>
                                <td class="text-secondary text-center">{{$item->jenis_tas}}</td>
                                <td class="text-secondary text-center">{{$item->bahan_luar}}</td>
                                <td class="text-secondary text-center">{{$item->bahan_tengah}}</td>
                                <td class="text-secondary text-center">{{$item->bahan_dalam}}</td>
                                <td class="text-secondary text-center" >{{$item->ukuran_tas_khusus}}</td>
                                <td class="text-secondary text-center">{{$item->jenis_bahan}}</td>
                                <td class="text-secondary text-center">{{$item->warna_bahan}}</td>
                                <td class="text-secondary text-center">{{$item->list_tas}}</td>
                                <td class="text-secondary text-center">{{$item->catatan}}</td>
                                @if ($item->status == 'Menunggu')
                            <td class="text-secondary text-center">Status Pesanan: {{$item->status}}</td>
                            @elseif($item->status == 'Diproses')
                            <td class="text-secondary text-center">Status Pesanan: {{$item->status}}</td>
                            @else
                            <td class="text-secondary text-center">Status Pesanan: {{$item->status}}</td>
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
