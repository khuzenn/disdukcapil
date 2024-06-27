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
            <h1>Data Loket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Loket</li>
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
                <a href="create-loket" class="btn btn-primary mt-2 mb-2">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              @if($user->isNotEmpty())
              <div class="card-body">
                <table id="data-user-loket" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>No Loket</th>
                    <th>Role</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($user as $index => $user)
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td> 
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->loket_id }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              @else
                <p>Tidak ada pengguna yang terkait dengan loket ini.</p>
              @endif
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
    $("#data-user-loket").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#data-purpose_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
