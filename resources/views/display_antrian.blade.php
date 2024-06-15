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
                                <img src='/assets/logo/1718125049.png' alt="Logo" height="110" class="p-2">
                                <div class="nav-link align-items-center">
                                    <h1 class="display-4">
                                        <b>DISDUKCAPIL JAKARTA</b>
                                    </h1>
                                    <h5>DISDUKCAPIL JAKARTA</h5>
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
                                <h2><i class="fas fa-expand-arrows-alt" style="color: {{$data->text_color}}"></i></h2>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="add-audio" style="dislay: none">
            <audio id="bell-announcement">
                <source src="" type="audio/ogg">
            </audio>
            <audio id="bell-closing">
                <source src="" type="audio/ogg">
            </audio>
        </div>
        <div class="row mt-3 mr-1 ml-1">
            <div class="col-md-5 text-center">
                <div class="alert alert-block alert-info" style="height:96%; background-color: {{$data->box_display_color}} !important; color: {{$data->text_color}} !important;">
                    <br>
                    <br>
                    <h2>Nomor Antrian</h2>
                    <hr>
                    <h1 class="display-1 font-weight-bold" id="nomor_antrian">-</h1>
                    <hr>
                    <h3 id="keterangan" style="display:inline;">- </h3>
                    <h3 style="display:inline;" class="font-weight-bold"><i class="icon fas fa-arrow-circle-right"></i> Loket </h3>
                    <h3 id="nomor_loket" style="display-inline;" class="font-weight-bold">-</h3>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-default">
                    <div class="card-body">
                        <iframe width="100%" height="340" src="https://www.youtube.com/embed/DOOrIxw5xOw&ab_channel?playlist=DOOrIxw5xOw&ab_channel&autoplay=1&loop=1&showinfo=0&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1 mr-1 ml-1">
            <div class="col-md-3 text-center">
                <div class="alert alert-info" style="height:96%; background-color: {{$data->box_display_color}} !important; color: {{$data->text_color}} !important;">
                    <h3>Nomor Antrian</h3>
                    <hr>
                    <h1 class="display-4 font-weight-bold" id="nomor_antrian_0">- </h1>
                    <hr>
                    <h5 id="keterangan_0" style="display:inline;">- </h5>
                    <h5 style="display:inline;" class="font-weight-bold"><i class="icon fas fa-arrow-circle-right"> </i> Loket </h5>
                    <h5 id="nomor_loket_0" style="display:inline;" class="font-weight-bold">-</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="alert alert-info" style="height:96%; background-color: {{$data->box_display_color}} !important; color: {{$data->text_color}} !important;">
                    <h3>Nomor Antrian</h3>
                    <hr>
                    <h1 class="display-4 font-weight-bold" id="nomor_antrian_0">- </h1>
                    <hr>
                    <h5 id="keterangan_0" style="display:inline;">- </h5>
                    <h5 style="display:inline;" class="font-weight-bold"><i class="icon fas fa-arrow-circle-right"> </i> Loket </h5>
                    <h5 id="nomor_loket_0" style="display:inline;" class="font-weight-bold">-</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="alert alert-info" style="height:96%; background-color: {{$data->box_display_color}} !important; color: {{$data->text_color}} !important;">
                    <h3>Nomor Antrian</h3>
                    <hr>
                    <h1 class="display-4 font-weight-bold" id="nomor_antrian_0">- </h1>
                    <hr>
                    <h5 id="keterangan_0" style="display:inline;">- </h5>
                    <h5 style="display:inline;" class="font-weight-bold"><i class="icon fas fa-arrow-circle-right"> </i> Loket </h5>
                    <h5 id="nomor_loket_0" style="display:inline;" class="font-weight-bold">-</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="alert alert-info" style="height:96%; background-color: {{$data->box_display_color}} !important; color: {{$data->text_color}} !important;">
                    <h3>Nomor Antrian</h3>
                    <hr>
                    <h1 class="display-4 font-weight-bold" id="nomor_antrian_0">- </h1>
                    <hr>
                    <h5 id="keterangan_0" style="display:inline;">- </h5>
                    <h5 style="display:inline;" class="font-weight-bold"><i class="icon fas fa-arrow-circle-right"> </i> Loket </h5>
                    <h5 id="nomor_loket_0" style="display:inline;" class="font-weight-bold">-</h5>
                </div>
            </div>
        </div>
    </section>

    <div class="footer" style="background-color: {{$data->header_color}}!important; color: {{$data->text_color}}!important;">
        <marquee>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio reprehenderit laborum quam possimus cumque ad culpa dolorem asperiores dignissimos excepturi.</marquee>
    </div>

<!-- jQuery -->
<script language="Javascript" type="text/javascript" src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
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
    var refreshAntrianAktifId = setInterval(tableAntrianAktifRefresh, 5000);
    tableAntrianRefresh();
    var refreshAntrianId = setInterval(tableAntrianRefresh, 5000);

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
            serverSide: false,
            ajax: {
                url: "",
                type: 'GET',
                DataType: 'JSON'
            },
            order: [[1,'asc']],
            // scrollX: true,
            processing: true,
            columns: [
                {data: 'nomor_antrian'},
                {data: 'nomor_loket'},
                {data: 'keterangan'}
            ],
            "responsive" : true,
            "bDestroy": true
        });
    }

    function tableAntrianRefresh(){
        $('#table-antrian').DataTable({
            serverSide: false,
            ajax: {
                url: "",
                type: 'GET',
                DataType: 'JSON'
            },
            order: [[1,'asc']],
            // scrollX: true,
            processing: true,
            columns: [
                {data: 'keterangan'},
                {data: 'kode'},
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