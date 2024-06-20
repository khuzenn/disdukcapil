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
                        <form action="{{ route('register') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" :value="__('Name')" >Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap Pengguna">
                                </div>
                                <div class="form-group">
                                    <label for="email" :value="__('Email')">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Pengguna">
                                </div>
                                <div class="mt-4">
                                    <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option value="operator">Operator</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password" :value="__('Password')">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="********">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" :value="__('Confirm Password')"></label>
                        
                                    <input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="card-footer">
                                <x-primary-button class="ml-4">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.footer')

