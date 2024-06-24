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
                             <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="username">{{ __('Username') }}</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
        
                                <div class="form-group">
                                    <label for="role">{{ __('Role') }}</label>
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                        <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="photo">{{ __('Photo') }}</label>
                                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="loket_id">{{ __('Loket') }}</label>
                                    <select id="loket_id" class="form-control @error('loket_id') is-invalid @enderror" name="loket_id">
                                        @foreach ($lokets as $loket)
                                            <option value="{{ $loket->id }}" {{ $user->loket_id == $loket->id ? 'selected' : '' }}>{{ $loket->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('loket_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
