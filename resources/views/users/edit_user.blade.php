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
                        <li class="breadcrumb-item">Edit Pengguna</li>
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
                            <h3 class="card-title">Edit Pengguna</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap..."required autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Username') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username..."required autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email..."required autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">{{ __('Role') }}</label>
                                    <div class="input-group">
                                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user-tag"></span>
                                            </div>
                                        </div>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="loket_id">{{ __('Loket') }}</label>
                                    <div class="input-group">
                                        <select name="loket_id" id="loket_id" class="form-control @error('loket_id') is-invalid @enderror">
                                            <option value=""></option>
                                            @foreach ($lokets as $loket)
                                                <option value="{{ $loket->id }}" {{ $user->loket_id == $loket->id ? 'selected' : '' }}>{{ $loket->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" value="" class="form-control @error('password') is-invalid @enderror" placeholder="********" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                                    <div class="input-group">
                                        <input type="password" name="password-confirm" id="password-confirm" value="" class="form-control @error('password-confirm') is-invalid @enderror" placeholder="********" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo">{{ __('Photo') }}</label>
                                    <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </section>
</div>

@include('components.footer')
