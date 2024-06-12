@include('components.header')
@include('components.navbar')
@include('components.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Tujuan Loket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Tujuan Loket</li>
            </ol>
          </div>
          @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show mb-0 mt-3" role="alert">
                  {{$message}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <script>
                  // Auto close alert after 5 seconds
                  setTimeout(function(){
                      $('.alert').alert('close');
                  }, 3000);
              </script>
          @endif
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="/purpose" class="btn btn-sm btn-danger mt-2 mb-2"><i class="fa fa-chevron-left"></i>&nbsp Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data-purpose" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama Loket</th>
                    <th>Nomor Loket</th>
                    <th>Kode Antrian</th>
                    <th>Jenis Antrian</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($data as $loket)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $loket->name }}</td>
                        <td>{{ $loket->nomor }}</td>
                        @php
                          $purpose = App\Models\Purpose::find($loket->purpose_id);
                        @endphp
                        <td>{{ $purpose->kode }}</td>
                        <td>{{ $purpose->jenis }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('components.footer')
<!-- Page specific script -->
<script>
  $(function () {
    $("#data-purpose").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#data-purpose_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
