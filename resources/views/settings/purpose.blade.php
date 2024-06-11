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
                <a href="#" class="btn btn-primary mt-2 mb-2">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data-purpose" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Kode Antrian</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>A</td>
                        <td>Pelayanan</td>
                        <td>Pelayanan KTP</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success"><span class="fas fa-th"></span></a>
                            <a href="#" class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
                            <a href="#" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></a>
                        </td>
                    </tr>
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
