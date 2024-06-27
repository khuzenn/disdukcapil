@include('components.header')
@include('components.navbar')
@include('components.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Loket</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/data-loket">Loket</a></li>
                        <li class="breadcrumb-item active">Tambah Loket</li>
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
                            <h3 class="card-title">Tambah Loket</h3>
                        </div>
                        <form id="quickForm" action="addLoket" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Loket</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Loket">
                                </div>
                                <div class="form-group">
                                    <label for="nomor">Nomor Loket</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control" placeholder="Nomor Loket">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">Jenis Antrian</label>
                                    <select name="purpose_id" id="purpose_id" class="form-control">
                                        <option value="">Pilih Tujuan</option>
                                        @foreach($purposes as $purpose)
                                            <option value="{{ $purpose->id }}">{{ $purpose->jenis }} - (Kode : {{ $purpose->kode }})</option>
                                        @endforeach
                                    </select>
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