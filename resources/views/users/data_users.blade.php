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
            <h1>Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Pengguna</li>
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
                <a href="create-users" class="btn btn-primary mt-2 mb-2">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user-data" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no=1;
                      
                    @endphp
                    @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="d-flex justify-content-center">
                          <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mx-2" onclick="deleteUser({{ $user->id }})"><span class="fas fa-trash"></span></button>
                          </form>
                          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                    
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
    $("#user-data").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#user-data_wrapper .col-md-6:eq(0)');
  });

  function deleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            // Lakukan request penghapusan menggunakan AJAX atau form submission
            $.ajax({
                url: 'admin/users',
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Tampilkan alert atau lakukan refresh halaman jika perlu
                    alert('User deleted successfully');
                    location.reload(); // Contoh: refresh halaman
                }
            });
        }
    }
</script>
</body>
</html>
