<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pelayanan DISDUKCAPIL</title>
  <!-- Stylesheets -->
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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <style>
    .flex-container { display: flex; justify-content: center; align-items: center; }
    .footer { position: fixed; bottom: 0px; right: 0px; width: 100%; z-index: 1000; padding: 2px; margin: auto; text-align: center; float: none; box-shadow: 0px -2px 10px #c0c0c0; background-color: var(--primary); color: #fff; }
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
                                <h2><i class="fas fa-expand-arrows-alt" style="color: {{$data->text_color}}"></i></h2>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="add-audio" style="display: none">
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
                    <br><br>
                    <h2>Nomor Antrian</h2>
                    <hr>
                    <h1 class="display-1 font-weight-bold" id="nomor_antrian">-</h1>
                    <hr>
                    <h3 id="keterangan" style="display:inline;">- </h3>
                    <h3 style="display:inline;" class="font-weight-bold"><i class="icon fas fa-arrow-circle-right"></i> Loket </h3>
                    <h3 id="nomor_loket" style="display:inline;" class="font-weight-bold">-</h3>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-default">
                    <div class="card-body">
                        {{-- <iframe width="100%" height="340" src="https://www.youtube.com/embed/DOOrIxw5xOw?playlist=DOOrIxw5xOw&autoplay=1&loop=1&showinfo=0&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                    </div>
                </div>
            </div>
        </div>
            <div class="row mt-1 mr-1 ml-1">
                @foreach(range(1, 4) as $box)
                @php
                    $setting = $settings->firstWhere('box', 'box_' . $box);
                    $antrian = $setting ? \App\Models\Antrian::where('status', 'called')->where('loket_id', $setting->loket_id)->first() : null;
                    $formatted_nomor_antrian = $antrian ? $antrian->purpose->kode . str_pad($antrian->nomor_antrian, 3, '0', STR_PAD_LEFT) : '-';
                @endphp
                <div class="col-md-3 text-center">
                    <div class="alert alert-info" style="height:96%; background-color: {{ $data->box_display_color }} !important; color: {{ $data->text_color }} !important;">
                        <h3>Nomor Antrian</h3>
                        <hr>
                        <h1 class="display-4 font-weight-bold" id="nomor_antrian_{{ $box }}" data-called-count="{{ $antrian ? $antrian->called_count : '0' }}">{{ $formatted_nomor_antrian }}</h1>
                        <hr>
                        <h5 id="keterangan_{{ $box }}" style="display:inline;">{{ $antrian ? $antrian->keterangan : '-' }}</h5>
                        <h5 style="display:inline;" class="font-weight-bold"><i class="icon fas fa-arrow-circle-right"> </i> Loket </h5>
                        <h5 id="nomor_loket_{{ $box }}" style="display:inline;" class="font-weight-bold">{{ $antrian ? $antrian->loket->nomor : '-' }}</h5>
                        @unless($setting)
                            <p>Box ini tidak Aktif</p>
                        @endunless
                    </div>
                </div>
                @endforeach
            </div>
    </section>

    <!-- Scripts -->
    <script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
    
    <script src="/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
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
    <script src="/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/AdminLTE/plugins/toastr/toastr.min.js"></script>

<script >
    function startTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('timer').innerHTML = h + ":" + m + ":" + s;
      var t = setTimeout(startTime, 500);
     }

    function checkTime(i) {
      if (i < 10) { i = "0" + i };
      return i;
    }
    $(document).ready(function() {

// Fungsi untuk memanggil suara menggunakan SpeechSynthesis API
function callQueue(number, loket) {
    if ('speechSynthesis' in window) {
        var msg = new SpeechSynthesisUtterance();
        msg.text = `Nomor antrian ${number}, silakan menuju loket ${loket}`;
        msg.lang = 'id-ID'; // Bahasa Indonesia
        window.speechSynthesis.speak(msg);
    } else {
        alert('Browser Anda tidak mendukung Speech Synthesis API.');
    }
}
    function updateAntrian() {
        $.ajax({
            url: '/get-latest-antrian',
            method: 'GET',
            success: function(data) {
                console.log(data);
                data.forEach(function(box) {
                    var currentNumber = $('#nomor_antrian_' + box.box).text().trim();
                    var newNumber = box.nomor_antrian;
                    var newLoket = box.nomor_loket;

                    if (currentNumber !== newNumber) {
                        $('#nomor_antrian_' + box.box).text(newNumber);
                        $('#keterangan_' + box.box).text(box.keterangan);
                        $('#nomor_loket_' + box.box).text(newLoket);
                        
                        // Panggil fungsi callQueue
                        callQueue(newNumber, newLoket);
                        } else if (box.called_count > parseInt($('#nomor_antrian_' + box.box).attr('data-called-count'))) {
                        $('#nomor_antrian_' + box.box).attr('data-called-count', box.called_count);

                        // Panggil fungsi callQueue jika called_count berubah
                        callQueue(newNumber, newLoket);
                    }
                    });
                }
            });
        }

        setInterval(updateAntrian, 5000);
        updateAntrian();
});
</script>
</body>
</html>
