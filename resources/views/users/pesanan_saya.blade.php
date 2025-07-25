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
                   <div class="row">
                        <div class="col-sm-8">
                            @if ($item->status == 'Menunggu')
                            <h6 class="m-0 font-weight-bold text-warning">Status Pesanan: {{$item->status}}</h6>
                             @elseif($item->status == 'Menunggu Pembayaran')
                            <h6 class="m-0 font-weight-bold text-info">Status Pesanan: {{$item->status}}</h6>
                            @elseif($item->status == 'Diproses')
                            <h6 class="m-0 font-weight-bold text-primary">Status Pesanan: {{$item->status}}</h6>
                            @else
                            <h6 class="m-0 font-weight-bold text-success">Status Pesanan: {{$item->status}}</h6>
                            @endif
                        </div>
                        <div class="col-sm-4 text-right">
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalLong1{{$item->id}}">Detail</button>
                            @if ($item->status == 'Menunggu Pembayaran')
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal4{{$item->id}}">Bayar</button>
                            @else
                                
                            @endif
                            
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No Pesanan</th>
                            <td>{{$item->no_pesanan}}</td>
                        </tr>
                         <tr>
                            <th>Tanggal Pesanan</th>
                            <td>{{ date('d/M/Y', strtotime($item->tanggal_pesan)) }}</td>
                        </tr>
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
                        {{-- <tr>
                            <th>Jenis Bahan</th>
                            <td>{{$item->jenis_bahan}}</td>
                        </tr> --}}
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
                            <th>Pengiriman</th>
                            <td>{{$item->pengiriman}}</td>
                        </tr>
                       <tr>
                            <th>Subtotal</th>
                            <td class="text-right">Rp. {{ number_format($item->subtotal ,0, ',', '.') }}</td>
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

@foreach ($ps as $item)
    

<form action="{{url('pembayaran/'. $item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="exampleModal4{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Nominal yang harus dibayar</label>
                <input type="text" class="form-control" id="exampleInputText1" value="Rp. {{ number_format($item->subtotal ,0, ',', '.') }}" required disabled>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Bukti pembayaran</label>
                <input type="file" class="form-control" id="" name="bukti_pembayaran" required>
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

@foreach ($ps as $item)
    
<div class="modal fade" id="exampleModalLong1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if ($item->status == 'Menunggu')
                            <h6 class="m-0 font-weight-bold text-warning">Status Pesanan: {{$item->status}}</h6>
                             @elseif($item->status == 'Menunggu Pembayaran')
                            <h6 class="m-0 font-weight-bold text-info">Status Pesanan: {{$item->status}}</h6>
                            @elseif($item->status == 'Diproses')
                            <h6 class="m-0 font-weight-bold text-primary">Status Pesanan: {{$item->status}}</h6>
                            @else
                            <h6 class="m-0 font-weight-bold text-success">Status Pesanan: {{$item->status}}</h6>
                            @endif</h5>
                            <br>
            <div class="row">
                
                <div class="col-sm-6">
                    <h5>Data Pengguna</h5>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->users->name}}" required disabled>
                    </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputText1">No Telepon</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->users->no_tlp}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Email</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->users->email}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Email</label>
                       <textarea name="" id="" cols="34" rows="10" disabled>{{$item->users->alamat}}</textarea>
                    </div>
                    <h5>Pembayaran & Pengiriman</h5>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Subtotal</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="Rp. {{ number_format($item->subtotal ,0, ',', '.') }}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Pengiriman</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->pengiriman}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Status Pembayaran</label>
                      @php
    $status = match($item->status) {
        'Menunggu' => 'Belum dibayar',
        'Menunggu Pembayaran' => 'Belum dibayar',
        default => 'Dibayar'
    };
@endphp
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$status}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Bukti Pembayaran</label>
                        <center>
                            <img src="{{ url('/photos/'.$item->bukti_pembayaran)}}" width="70%">
                        </center>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h5>Data Pesanan</h5>
                                        <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Tanggal Pesan</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->tanggal_pesan}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">No Pesanan</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->no_pesanan}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Jenis Tas</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->jenis_tas}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Bahan Luar</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->bahan_luar}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Bahan Tengah</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->bahan_tengah}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Bahan Dalam</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->bahan_dalam}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Ukuran Tas Khusus</label>
                        <textarea name="" id="" cols="34" rows="5" disabled>{{$item->ukuran_tas_khusus}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Warna Bahan</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->warna_bahan}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">List Tas</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{$item->list_tas}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Catatan</label>
                        <textarea name="" id="" cols="34" rows="5" disabled>{{$item->catatan}}</textarea>
                    </div>
                </div>
            </div>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>


@endforeach

<script type="text/javascript">
    var subtotal = document.getElementById('subtotal');
    subtotal.addEventListener('keyup', function(e)
    {
        subtotal.value = formatRupiah(this.value, 'Rp. ');
    });
   
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }
    </script>