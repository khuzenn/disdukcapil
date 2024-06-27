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
            <h1>Data Outlet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Outlet</li>
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
                <a href="create-outlet" class="btn btn-primary mt-2 mb-2">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data-loket" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama Outlet</th>
                    <th>Alamat Outlet</th>
                    <th>No Telpon</th>
                    <th>Tema</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($data as $outlet)
                      <tr class="text-center">
                          <td scope="row">{{$no++}}</td>
                          <td>{{$outlet->name}}</td>
                          <td>{{$outlet->address}}</td>
                          <td>{{$outlet->no_telp}}</td>
                          <td>
                              <div class="d-flex">
                                  <div class="mr-1" style="width: 1rem; height: 1rem; background-color: {{$outlet->header_color}}; border: 1px solid #000000;"></div>
                                  <div class="mr-1" style="width: 1rem; height: 1rem; background-color: {{$outlet->box_display_color}}; border: 1px solid #000000;"></div>
                                  <div class="mr-1" style="width: 1rem; height: 1rem; background-color: {{$outlet->box_ambil_color}}; border: 1px solid #000000;"></div>
                                  <div class="mr-1" style="width: 1rem; height: 1rem; background-color: {{$outlet->text_color}}; border: 1px solid #000000;"></div>
                              </div>
                          </td>
                          <td>
                              <a href="{{ route('admin.getOutlet',['id' => $outlet->id]) }}" class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
                              <a href="{{ route('admin.deleteOutlet',['id' => $outlet->id]) }}" class="btn btn-sm btn-danger" onclick="deleteOutlet({{ $outlet->id }})"><span class="fas fa-trash"></span></a>
                          </td>
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
    $("#data-loket").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#data-loket_wrapper .col-md-6:eq(0)');
  });

  function deleteOutlet(outletId) {
        if (confirm('Apakah Anda yakin ingin menghapus outlet ini?')) {
            // Jika pengguna mengonfirmasi penghapusan, kirim permintaan penghapusan ke server
            window.location.href = '/delete-outlet/' + outletId;
        } else {
            // Jika pengguna membatalkan penghapusan, tidak lakukan apa pun
            return false;
        }
    }
</script>
</body>
</html>
