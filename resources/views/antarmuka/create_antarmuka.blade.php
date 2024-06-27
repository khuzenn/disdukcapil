@include('components.header')
@include('components.navbar')
@include('components.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Antarmuka</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/data-loket">Antarmuka</a></li>
                        <li class="breadcrumb-item active">Tambah Antarmuka</li>
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
                            <h3 class="card-title">Tambah Antarmuka</h3>
                        </div>
                        <form id="quickForm" action="addAntarmuka" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Vidio</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Loket">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <select name="keterangan" id="keterangan" class="form-control">
                                        <option value="">Pilih Tipe</option>
                                        <option value="Local">Local (Upload)</option>
                                        <option value="Youtube">Youtube</option>
                                    </select>
                                </div>
                                <div class="form-group" id="formYoutube">
                                    <label for="source_youtube">Alamat URL</label>
                                    <input type="text" name="source_youtube" id="source_youtube" class="form-control" placeholder="Alamat Url">
                                </div>
                                <div class="form-group" id="formLocal">
                                    <label for="source_local">Upload Media</label>
                                    <input type="file" name="source_local" id="source_local" class="form-control" placeholder="Sumber File">
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
    $('#formYoutube').hide();
    $('#formLocal').hide();

    $('#keterangan').change(function(){
        formData();
    });

    function formData() {
        if ($('#keterangan').val() == 'Local') {
            $('#formYoutube').hide();
            $('#formLocal').show();
        } else {
            $('#formLocal').hide();
            $('#formYoutube').show();
        }
    }
</script>

