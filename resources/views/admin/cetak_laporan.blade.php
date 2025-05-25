<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPTMC</title>
    <link rel="shortcut icon" href="{{asset('images/maxvolum.png')}}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;

        }
        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            
            padding-bottom: 10px;
            margin-bottom: 20px;
            
        }
        .kop-surat img {
            width: 90px;
            height: 90px;
            margin-right: 20px;
        }
        .kop-surat .text {
            text-align: center;
        }
        .kop-surat .text h1 {
            margin: 0;
            font-size: 18px;
        }
        .kop-surat .text h2 {
            margin: 0;
            font-size: 16px;
            font-weight: normal;
        }
        .kop-surat .text h3 {
            margin: 0;
            font-size: 14px;
            font-weight: normal;
        }
        .kop-surat .text p {
            margin: 0;
            font-size: 12px;
            font-style: italic;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
           
        }
        td {
            padding: 8px;
            text-align: center;
            font-size: 10px;

        }
        th {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        h1{
            font-size: 16px;
        }
        hr{
            border-bottom: 2px solid black;
       
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        
        <img src="{{asset('images/maxvolum.png')}}" alt="Logo Posyandu"> <!-- Ganti logo.png dengan path logo -->
        <div class="text">
            <center>
            <h1>Sistem Informasi Pemesanan Tas Motor Custom</h1>
            <h2>Maxvolum</h2>
            <h3>Laporan Data Pesanan Tas Periode: {{ date('d-m-Y', strtotime($tglawal)) }} - {{ date('d-m-Y', strtotime($tglakhir)) }}</h3>
        </center>
        </div>

    </div>
    <div class="card">
        
        <div class="col-sm-12">
     
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 25px;">No</th>
                        <th style="width: 100px;">Nama Pemesan</th>
                        <th style="width: 100px;">Tanggal Pesan</th>
                        <th style="width: 100px;">Jenis Tas</th>
                        <th style="width: 100px;">Bahan Luar</th>
                        <th style="width: 100px;">Bahan Tengah</th>
                        <th style="width: 100px;">Bahan Dalam</th>
                        <th style="width: 150px;">&nbsp;&nbsp;Ukuran&nbsp;&nbsp;Tas Khusus</th>
                        <th style="width: 100px;">Jenis Bahan</th>
                        <th style="width: 100px;">Warna Bahan</th>
                        <th style="width: 100px;">List Tas</th>
                        <th style="width: 100px;">Catatan</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cl as $no=>$item)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$item->users->name}}</td>
                        <td>{{date("d/M/Y", strtotime($item->tanggal_pesan));}}</td>
                        <td>{{$item->jenis_tas}}</td>
                        <td>{{$item->bahan_luar}}</td>
                        <td>{{$item->bahan_tengah}}</td>
                        <td>{{$item->bahan_dalam}}</td>
                        <td >{{$item->ukuran_tas_khusus}}</td>
                        <td>{{$item->jenis_bahan}}</td>
                        <td>{{$item->warna_bahan}}</td>
                        <td>{{$item->list_tas}}</td>
                        <td>{{$item->catatan}}</td>
                      
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>