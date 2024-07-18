<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Pelayanan DISDUKCAPIL</title>

  <!-- Include necessary CSS libraries -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="/AdminLTE/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="/AdminLTE/plugins/toastr/toastr.min.css">

  <style>
    .flex-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .footer {
      position: fixed;
      bottom: 0px;
      right: 0px;
      width: 100%;
      z-index: 1000;
      padding: 2px;
      margin: auto;
      text-align: center;
      float: none;
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
        <nav class="navbar navbar-expand navbar-primary" style="background-color: {{$data->header_color}}!important; color: {{$data->text_color}}!important;">
          <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
              <div class="flex-container">
                <img src='/assets/logo/1718809145.png' alt="Logo" height="110" class="p-2">
                <div class="nav-link align-items-center">
                  <h1 class="display-4"><b>{{$data->name}}</b></h1>
                  <h5>{{$data->name}}</h5>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
              <div class="nav-link">
                <h4><b><div id="timer"></div></b></h4>
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
    <div class="row justify-content-center mt-2">
      <div class="col-lg-12 mb-4">
        <h3 class="mt-4 text-center">Informasi Antrian</h3>
        <hr>
      </div>
      <div class="card col-sm-12 col-md-8 col-lg-6 mb-3">
        <div class="card-header">
          <div class="card-title col-lg-12">
            <h2 class="text-center mb-0" style="font-weight: bold;">{{$data->name}}</h2>
            <p class="text-center">{{$data->address}}</p>
          </div>
        </div>
        <div class="card-body">
          <div class="text-center">
            <h3 class="text-center" style="font-weight: bold;">{{ $antrian->jenis_antrian }}</h3>
            <h5 class="text-center">Nomor Antrian Anda : </h5>
            <div class="text-center">
              <div class="border border-dark d-inline-block p-2 my-3">
                @php
                $formatted_nomor_antrian = $antrian ? $antrian->purpose->kode . str_pad($antrian->nomor_antrian, 3, '0', STR_PAD_LEFT) : '-';
                @endphp
                <h1 class="text-center font-weight-bold">{{ $formatted_nomor_antrian }}</h1>
                <h3 class="text-center" style="font-weight: bold;">Menuju Loket: {{ $antrian->loket->nomor }}</h3>
              </div>
            </div>
            <p class="text-center">SILAHKAN MENUNGGU NOMOR ANTRIAN DIPANGGIL <br> NOMOR INI HANYA BERLAKU PADA HARI DICETAK <br>{{ $tanggalHariIni }}</p</p>
            <h4 class="text-center font-weight-bold">Terima Kasih Anda Telah Tertib</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="footer" style="background-color: {{$data->header_color}}!important; color: {{$data->text_color}}!important;">
    <marquee>{{$data->running_text}}</marquee>
  </div>

  <!-- Include necessary JS libraries -->
  <script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
  <script src="/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/AdminLTE/plugins/chart.js/Chart.min.js"></script>
  <script src="/AdminLTE/plugins/sparklines/sparkline.js"></script>
  <script src="/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="/AdminLTE/plugins/moment/moment.min.js"></script>
  <script src="/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="/AdminLTE/dist/js/adminlte.js"></script>
  <script src="/AdminLTE/dist/js/demo.js"></script>
  <script src="/AdminLTE/dist/js/pages/dashboard.js"></script>
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
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);

      if (dd < 10) {
        dd = '0' + dd;
      }
      document.getElementById('timer').innerHTML =
        "Tanggal: " + dd + "/" + mm + "/" + yyyy + " | " + h + ":" + m + ":" + s;
      var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
      if (i < 10) { i = "0" + i };
      return i;
    }
  </script>

  <script>
  </script>
</body>
</html>
