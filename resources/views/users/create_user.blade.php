@include('components.header')
@include('components.navbar')
@include('components.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/users">Pengguna</a></li>
                        <li class="breadcrumb-item">Tambah Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Pengguna</h3>
                        </div>
                        <form id="quickForm" action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap Pengguna">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username Pengguna">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">Loket</label>
                                    <select name="loket_id" id="loket_id" class="form-control">
                                        <option value="" class="form-control">Pilih Loket</option>
                                        <option value="" class="form-control">1</option>
                                        <option value="" class="form-control">2</option>
                                        <option value="" class="form-control">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">Role</label>
                                    <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="No.Telepon Outlet">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="********">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.footer')
