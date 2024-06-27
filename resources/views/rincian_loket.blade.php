<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pelayanan DISDUKCAPIL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/AdminLTE/plugins/summernote/summernote-bs4.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/AdminLTE/plugins/toastr/toastr.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- jQuery -->
   <script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>

  <style>
    .flex-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .footer {
      position:fixed;
      bottom:0px;
      right: 0px;
      width:100%;
      z-index:1000;
      padding:2px;
      margin:auto;
      text-align:center;
      float:none;
      box-shadow: 0px -2px 10px #c0c0c0;
      background-color: var(--primary);
      color: #fff;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini" onload="startTime()">
    <div class="wrapper hw-100">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand navbar-primary" style="background-color: {{$data->header_color}} !important; color: {{$data->text_color}} !important;">
                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-sm-inline-block">
                            <div class="flex-container">
                                <img src='/assets/logo/1718809145.png' alt="Logo" height="110" class="p-2">
                                <div class="nav-link align-items-center">
                                    <h1 class="display-4">
                                        <b>{{$data->name}}</b>
                                    </h1>
                                    <h5>{{$data->name}}</h5>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item d-none d-sm-inline-block">
                            <div class="nav-link">
                                <h4>
                                    <b><div id="timer"></div></b>
                                </h4>
                            </div>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link" data-widget="fullscreen" role="button">
                                <h2><i class="fas fa-expand-arrows-alt" style="color: #ffffff"></i></h2>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-7">
                        <!-- Line Chart -->
                         <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-star"></i>
                                    Antrian Aktif
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table-antrian-aktif" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomor Antrian</th>
                                            <th>Nomor Loket</th>
                                            <th>Jenis Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                         </div>
                         <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-star"></i>
                                    Jumlah Antrian Belum Dipanggil
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table-antrian" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Jenis Transaksi</th>
                                            <th>Kode Antrian</th>
                                            <th>Jumlah Antrian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card card-primary card-outline" id="setOverlay">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-check-square"></i>
                                    Action
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary " type="button" id="panggil" data-users="1">Panggil (Enter)</button>
                                <button class="btn btn-success " type="button" id="panggil-ulang" data-users="1">Ulangi (F9)</button>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-user"></i>
                                    Detail Loket
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <img src="/assets/logo/1718809145.png" alt="" class="img-thumbnail" width="100">
                                </div>
                                <h3 class="profile-username text-center">Khuzen</h3>
                                <p class="text-muted text-center">khuzen123</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nomor Loket</b><a class="float-right">2</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Jenis Loket</b><a class="float-right">Kode (K) - Pelayanan KTP</a>
                                    </li>
                                </ul>
                                <div class="row justify-content-center">
                                    <a href="#" class="btn btn-success btn-block mb-2">Kembali ke Menu</a>
                                    <a href="#" class="btn btn-secondary btn-block mb-2">Upload Foto Profil</a>
                                    <a href="#" class="btn btn-warning btn-block mb-2">Ubah Password</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="footer" style="background-color: {{$data->header_color}} !important; color: {{$data->text_color}} !important;">
        <marquee>{{$data->running_text}}</marquee>
    </div>

<!-- jQuery -->
<!-- <script language="Javascript" type="text/javascript" src="/AdminLTE/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/AdminLTE/plugins/toastr/toastr.min.js"></script>
<!-- ChartJS -->
<script src="/AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/AdminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/AdminLTE/plugins/moment/moment.min.js"></script>
<script src="/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/AdminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- Datatables -->
<script src="/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Start Time -->
<script type="text/javascript">
  function startTime() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    
    if(dd<10){
      dd = '0'+dd;
    }
    document.getElementById('timer').innerHTML =
    "Tanggal: " + dd + "/" + mm + "/" + yyyy + " | " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
  }
  function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
  }
</script>

<script type="text/javascript">
    $(document).ready(function(){
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    tableAntrianAktifRefresh();
    // var refreshAntrianAktifId = setInterval(tableAntrianAktifRefresh, 5000); 
    tableAntrianRefresh();
    // var refreshAntrianId = setInterval(tableAntrianRefresh, 5000);

    $(document).keyup(function(event) {
        if (event.keyCode === 13) {
            $("#panggil").click();
        }
    });

    $(document).keyup(function(event) {
        if (event.keyCode === 120) {
            panggilUlang();
        }
    });
                
    $('#panggil').on('click', function(){
        var id_user = $('#panggil').data('users');

        $.ajax({
            url: "",
            method: 'POST',
            data: {
                _token: '',
                user_id: id_user
            },
            dataType: 'json',
            success: function(data){
                var nomor_loket = data['nomor_loket'];
                var antrian_sebelumnya = data['antrian_sebelumnya'];
                var antrian_panggil = data['antrian_panggil'];

                panggilUlang();
                tableAntrianAktifRefresh();
                tableAntrianRefresh();
            }
        });
    });

    $('#panggil-ulang').on('click', function(){
        panggilUlang();
    });

    function panggilUlang(){
        $('#setOverlay').append('<div class="overlay" id="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i></div>');
        var id_user = $('#panggil-ulang').data('users');

        $.ajax({
            url: "",
            method: 'POST',
            data: {
                _token: '',
                user_id: id_user
            },
            dataType: 'json',
            success: function(data){
                var nomor_loket = data['nomor_loket'];
                var nomor_antrian = data['nomor_antrian'];

                actionPanggil(nomor_antrian);

                Toast.fire({
                    icon: 'success',
                    title: 'Berhasil memanggil No. antrian '+nomor_antrian+' menuju loket '+nomor_loket,
                })
            }
        }).fail(function(){
            Toast.fire({
            icon: 'error',
            title: 'No. antrian gagal dipanggil! Silahkan cek koneksi database aplikasi.',
            })
        }).always(function(){
            $("#overlay").remove();
        });
    }

    function tableAntrianAktifRefresh(){
        $('#table-antrian-aktif').DataTable({
            serverSide: true,
            ajax: {
                url: "tabel-antrian-aktif",
                method: 'GET',
                DataType: 'JSON'
            },
            order: [[1,'asc']],
            // scrollX: true,
            processing: true,
            columns: [
                {data: 'nomor_antrian'},
                {data: 'nomor_loket'},
                {data: 'jenis_transaksi'}
            ],
            "responsive" : true,
            "bDestroy": true
        });
    }

    function tableAntrianRefresh(){
        $('#table-antrian').DataTable({
            serverSide: true,
            ajax: {
                url: "tabel-antrian",
                method: 'GET',
                DataType: 'JSON'
            },
            order: [[1,'asc']],
            // scrollX: true,
            processing: true,
            columns: [
                {data: 'jenis_transaksi'},
                {data: 'kode_antrian'},
                {data: 'jumlah_antrian'}
            ],
            "responsive" : true,
            "bDestroy": true
        });
    }

    function actionPanggil(nomor_antrian){
        $.ajax({
            url: "",
            method: 'POST',
            data: {
                _token: '',
                nomor_antrian: nomor_antrian
            },
            dataType: 'json',
            success: function(data){
                var status_code = data['status_code'];
            }
        });
    }
});
</script>
</body>
</html>