@php

use App\Models\Users;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

$user = Auth::user();


@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPTMC</title>
    <link rel="shortcut icon" href="{{asset('images/maxvolum.png')}}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    @yield('css')
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon bg-light">
                    <img src="{{asset('images/maxvolum.png')}}" width="100%" alt="">
                </div>
                <div class="sidebar-brand-text mx-3 text-light">MAXVOLUM</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0 mb-2">

            <center>
                <Strong class="text-light">{{$user->name}}</Strong><br>
                <small class="text-light">
                    @if ($user->role == 'admin')
                        Admin
                    @else
                        Pelanggan
                    @endif
                </small>
            </center>
            <!-- Divider -->
            <hr class="sidebar-divider my-0 mt-2">

            <!-- Nav Item - Dashboard -->
            @if ($user->role == 'admin')
            <li class="nav-item {{ request()->is('dashboard-admin*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard-admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main Menu
            </div>

            <li
                class="nav-item {{ request()->is('kelola-jenis-tas*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/kelola-jenis-tas') }}">
                    &nbsp;<i class="fas fa-shopping-bag"></i>
                    <span>Jenis Tas</span></a>
            </li>
            <li
                class="nav-item {{ request()->is('kelola-pesanan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/kelola-pesanan') }}">
                    &nbsp;<i class="fas fa-receipt"></i>
                    <span>Pesanan</span></a>
            </li>

            <div class="sidebar-heading">
                Report
            </div>

            <li
                class="nav-item {{ request()->is('laporan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/laporan') }}">
                    &nbsp;<i class="fas fa-file-alt"></i>
                    <span>Laporan</span></a>
            </li>

            <li
                class="nav-item {{ request()->is('cetak*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/cetak') }}">
                    <i class="fas fa-print"></i>
                    <span>Cetak</span></a>
            </li>
            @else
            <li class="nav-item {{ request()->is('/dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main Menu
            </div>

            <li
                class="nav-item {{ request()->is('jenis-tas*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/jenis-tas') }}">
                    &nbsp;<i class="fas fa-shopping-bag"></i>
                    <span>Jenis Tas</span></a>
            </li>

            <li
                class="nav-item {{ request()->is('pesan-tas-custom*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/pesan-tas-custom') }}">
                    &nbsp;<i class="fas fa-file"></i>
                    <span>Pesan Tas Custom</span></a>
            </li>

            <li
                class="nav-item {{ request()->is('pesanan-saya*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/pesanan-saya') }}">
                    &nbsp;<i class="fas fa-file"></i>
                    <span>Pesanan Saya</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
          
                <center>
                    <button type="button" class="btn btn-outline-danger btn-light w-75" data-toggle="modal" data-target="#exampleModal1">
                        <i class="fas fa-door-open"></i>&nbsp; Keluar
                    </button>
              </center>
   
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline mt-4">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <div class="col sm 12 pt-2">
                        <center>
                            <h3 class="text-dark">Sistem Informasi Pemesanan Tas Motor Custom</h3>
                        </center>
                        {{-- <p><span id="hari"></span>, <span id="tanggal"></span>&nbsp;<span
                                id="bulan"></span>&nbsp;<span id="tahun"></span>, <span id="waktu"></span>
                        </p> --}}
                    </div>

                </nav>

                @yield('content')


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIPTMC</span>&nbsp;<span id="tahun"></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <form  action="{{ route('logout') }}" method="POST">
        @csrf
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
        
                    <p>Apakah anda yakin ingin keluar dari website <b>SIPTMC</b>?</p>
        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                  <button type="submit" class="btn btn-primary">Ya</button>
                </div>
              </div>
            </div>
          </div>
    </form>
    

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    {{-- <script src="{{ asset('vendor/chart.js') }}/Chart.min.js')}}"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> --}}
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script type="text/javascript">
        function updateClock() {
            const now = new Date();

            document.getElementById('hari').textContent = now.toLocaleDateString(undefined, {
                weekday: 'long'
            });
            document.getElementById('tanggal').textContent = now.getDate();
            document.getElementById('bulan').textContent = now.toLocaleDateString(undefined, {
                month: 'long'
            });
            document.getElementById('tahun').textContent = now.getFullYear();
            document.getElementById('tahun1').textContent = now.getFullYear();
            document.getElementById('waktu').textContent = now.toLocaleTimeString();
        }

        // Update waktu setiap detik
        setInterval(updateClock, 1000);

        // Memastikan tampilan awal sudah terisi
        updateClock();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    
    @yield('js')

</body>

</html>
