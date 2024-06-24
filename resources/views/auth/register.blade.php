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
                        <li class="breadcrumb-item active"><a href="admin/users">Pengguna</a></li>
                        <li class="breadcrumb-item ">Tambah Pengguna</li>
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
                        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nama Lengkap Pengguna"required autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control" placeholder="Username Pengguna" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email Pengguna" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <div class="input-group">
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="" disabled selected>Pilih role...</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user-tag"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="role">Loket</label>
                                    <div class="input-group">
                                        <select id="loket_id" name="loket_id" class="form-control">
                                            @foreach ($lokets as $loket)
                                                <option value="">Pilih Loket...</option>
                                                <option value="{{ $loket->id }}">{{ $loket->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="****" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="****" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="photo" :value="__('Photo Profile')" />
                                    <input type="file" name="photo" id="photo" accept="image/*" class="block mt-1 w-full" />
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

<script>
    function previewImage() {
        var preview = document.querySelector('.img-preview');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "../assets/img/default-image.png";
        }
    }
</script>