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
                        <div class="">

                                <div class="card-body register-card-body items-center">
                                    <p class="login-box-msg">Register a new membership</p>
                    
                                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf
                    
                                        <div class="input-group mb-3">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" placeholder="Nama Lengkap Pengguna" name="name" value="{{ old('name') }}" required autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="input-group mb-3">
                                            <select class="custom-select" name="role" required>
                                                <option value="" disabled selected>Choose role...</option>
                                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                                                <!-- Add more options if needed -->
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user-tag"></span>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required autocomplete="new-password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <!-- Register button -->
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary btn-block ju">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.form-box -->
                        </div>
                        <!-- /.register-box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.footer')
